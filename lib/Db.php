<?php
namespace liw\lib;

use PDO;

class Db
{
    protected $db;

    public function __construct()
    {
        $config = require 'config/db.php';
        $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'',$config['user'],$config['pass']);
    } 

    public function query($sql, $params = []) 
    {
        $stmt = $this->db->prepare($sql);
        if(!empty($params))
        {
            $stmt->execute($params);
            return $stmt;
        }
        $stmt->execute();
        return $stmt;
    }

    public function row($sql, $params = []) 
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}