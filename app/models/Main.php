<?php

namespace liw\app\models;

use liw\core\Model;

class Main extends Model
{
    public function set($cleanEmailAdress, $provider)
    {
        $sql = "INSERT INTO `products` (`id`, `date`, `email`, `provider`) VALUES (NULL, current_timestamp(), ?, ?)";
        $this->db->row($sql, [$cleanEmailAdress, $provider] );  
    }
    
}