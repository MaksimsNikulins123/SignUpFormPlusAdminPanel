<?php

namespace liw\app\models;

use liw\core\Model;

class Row extends Model
{
    public function delete($id)
    {
        $sql = 'DELETE FROM `products` WHERE `products`.`id` = '.$id;
        $this->db->row($sql);
        

    
      
    }
   
}