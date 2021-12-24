<?php

namespace liw\app\models;

use liw\core\Model;

class Data extends Model
{
    public function get()
    {
        $sql = 'SELECT * FROM  products';
        $result = $this->db->row($sql);
        return $result;
      
    }
   
}
