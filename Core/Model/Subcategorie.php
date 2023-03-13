<?php

namespace Core\Model;

use Core\Base\Model;

class Subcategorie  extends Model
{


    public function check_name_exist(string $name)
    {
        $result = $this->connection->query("SELECT * FROM $this->table WHERE name_sub='$name'");
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


    public function  get_subcategories()
    {
       
        $result = $this->connection->query("
        
        SELECT subcategories.*,main_categories.name 
        FROM subcategories
         INNER JOIN main_categories 
         ON subcategories.main_categorie_id = main_categories.id");

        
                   
        
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



    public function  get_subcategories_by_id(int $id)
    {
       
        $stmt = $this->connection->prepare("
        SELECT subcategories.*,main_categories.name 
        FROM subcategories
         INNER JOIN main_categories 
         ON
          subcategories.id = ?
        AND
          subcategories.main_categorie_id = main_categories.id
       ");

        $stmt->bind_param('i', $id); // bind the params per data type 
        $stmt->execute(); // execute the statement on the DB
        $result = $stmt->get_result(); // get the result of the execution
        
        $stmt->close();
                   
        
        if ($result) {
           
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    return $row;
                }
                
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function  get_subcategories_by_id_main_categories(int $id)
    {
       
        $stmt = $this->connection->prepare("
        SELECT * FROM `subcategories` WHERE main_categorie_id = ?
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