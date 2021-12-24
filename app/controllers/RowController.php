<?php

namespace liw\app\controllers;

use liw\core\Controller;

class RowController extends Controller
{
    
    public function deleteAction()
    {
        $deleteID = $_POST['id'];
        $this->model->delete($deleteID);
    }
    
}