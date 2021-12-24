<?php

namespace liw\app\controllers;

use liw\core\Controller;

class FileController extends Controller
{
    public function exportAction()
    {
        $array = json_decode($_POST['array']);
        
        $this->model->export($array);
        
        
    }
    
}