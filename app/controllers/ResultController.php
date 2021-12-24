<?php
namespace liw\app\controllers;

use liw\core\Controller;

class ResultController extends Controller
{
    private $error = ''; 
    private $val = '';

    public function showAction()
    {
        $this->view->render('Show success page', $this->error, $this->val);
    }
}