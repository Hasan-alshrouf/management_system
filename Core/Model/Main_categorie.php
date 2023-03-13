<?php

namespace Core\Model;

use Core\Base\Model;

class Main_categorie  extends Model
{


    public function check_name_exist(string $name)
    {
        $result = $this->connection->query("SELECT * FROM $this->table WHERE name='$name'");
        if ($result) {
           
            if ($result->num_rows > 0) {
                return $result->fetch_object();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function  get_all_main_categories_except_one(int $id)
    {
       
        $stmt = $this->connection->prepare("
        SELECT * FROM main_categories WHERE NOT id =?
       ");

        $stmt->bind_param('i', $id); // bind the params per data type 
        $stmt->execute(); // execute the statement on the DB
        $result = $stmt->get_result(); // get the result of the execution
        
        $stmt->close();
                   
        
        if ($result) {
            $item = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    $item[] = $row;
                }
                return $item;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
  



   
}