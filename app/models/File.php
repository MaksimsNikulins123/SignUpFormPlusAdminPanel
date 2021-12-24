<?php

namespace liw\app\models;

use liw\core\Model;

class File extends Model
{
    public function export($array)
    {
   
        $idList = implode(",", $array);
  
        $sql = "SELECT email FROM products WHERE id IN ($idList)";
    
        $result = $this->db->row($sql);
    
        $output = fopen('C:\OpenServer\OSPanel\domains\localhost\emails.csv', 'w+');
        fputcsv($output, array('Exported Emails: '));
 
        if (count($result) > 0) 
        {
            foreach ($result as $row) {
                fputcsv($output, $row);
            }
        }
    }
   
}