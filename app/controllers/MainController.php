<?php

namespace liw\app\controllers;

use liw\core\Controller;

class MainController extends Controller
{
    private $mainError = "";

    public function indexAction()
    {

        if(empty($_POST))
        {
            $this->view->render('Start page', $this->mainError, '');
        }
        else
        {
            $email = $_POST['email'];
            $cleanEmailAdress = $this->clean_email_adress($email);

            $this->validateAction($cleanEmailAdress);
    
            $this->view->render('Start page', $this->mainError, $cleanEmailAdress);
        }
    }
    public function clean_email_adress($email)
    {
        $email = trim($email);
        $email = stripslashes($email);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);
        return $email;
    }
   
    public function getProvider($cleanEmailAdress)
    {
        $pieces = explode("@", $cleanEmailAdress);
        $pieces = explode(".", $pieces[1]);
        $provider = $pieces[count($pieces) - 2];
        return $provider;
    }

    public function validateAction($cleanEmailAdress)
    {
            if($cleanEmailAdress == '')
            {
                return $this->mainError = "Email address is required";
            }
            else
            {
                    if(!filter_var($cleanEmailAdress, FILTER_VALIDATE_EMAIL) && strlen($cleanEmailAdress) > 2)
                    {
                        return $this->mainError = "Please provide a valid e-mail address";
                    }
                    else
                    {
                        $pieces = explode(".", $cleanEmailAdress);

                        if($pieces[count($pieces)- 1] == 'co')
                        {
                            return $this->mainError = "We are not accepting subscriptions from Colombia emails";
                        }
                        else
                        {
                                if(!isset($_POST['checkbox']))
                                {
                                    return $this->mainError = "You must accept the terms and conditions";
                                }
                                else
                                {
                                    $provider = $this->getProvider($cleanEmailAdress);

                                    $result = $this->model->set($cleanEmailAdress, $provider);
 
                                    $this->view->redirect('/success');
                                } 
                        }
                        
                            
                }
            }
        return $this->mainError;
    }
}