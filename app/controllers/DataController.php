<?php

namespace liw\app\controllers;

use liw\core\Controller;

class DataController extends Controller
{
    public function getAction()
    {
        $result = $this->model->get();

        $this->view->render('Data page', '', $result);
    }
    
}