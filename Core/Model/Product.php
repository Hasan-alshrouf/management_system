<?php

namespace Core\Model;

use Core\Base\Model;

class Product extends Model
{


   


    public function check_name_exist(string $name)
    {
        $result = $this->connection->query("SELECT * FROM $this->table WHERE product_name='$name'");
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



    public function  get_all_products()
    {
       
        $result = $this->connection->query("
        SELECT products.* ,main_categories.name ,subcategories.name_sub,users.full_name
        FROM products  
        INNER JOIN  
        main_categories  
        ON  
        products.main_categorie_id = main_categories.id
        INNER JOIN 
        subcategories
        ON  
          products.subcategory_id = subcategories.id
          INNER JOIN 
          users
          ON 
           products.user_id = users.id
    ");

        
                   
        
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
  

    
    public function  get_products_by_id(int $id)
    {
       
        $stmt = $this->connection->prepare("
        SELECT products.* ,main_categories.name ,subcategories.name_sub,users.full_name
    FROM products 
    INNER JOIN  
    main_categories 
   ON 
    products.id = ?
    AND
    products.main_categorie_id = main_categories.id
    INNER JOIN 
    subcategories
    ON  
      products.subcategory_id = subcategories.id
      INNER JOIN 
      users
      ON 
       products.user_id = users.id
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
   

    
    function canBeUnserialized($string) {
        if (@unserialize($string) === false) {
            return false;
        }
        return true;
    }

    public function products(int $id , string $num)
    {
         $this->connection->query("UPDATE products SET product_image='$num' WHERE id=$id");
       
    }
 

    public function  get_products_by_id_main_categories(int $id)
    {
       
        $stmt = $this->connection->prepare("
        SELECT products.* ,main_categories.name ,subcategories.name_sub,users.full_name
    FROM products 
    INNER JOIN  
    main_categories 
   ON 
    main_categories.id = ?
    AND
    products.main_categorie_id = main_categories.id
    INNER JOIN 
    subcategories
    ON  
      products.subcategory_id = subcategories.id
      INNER JOIN 
      users
      ON 
       products.user_id = users.id

    
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
    public function  get_products_by_id_main_categories_and_sub_id(int $idm ,int $ids)
    {
       
        $stmt = $this->connection->prepare("
       

SELECT products.* ,main_categories.name ,subcategories.name_sub,users.full_name
FROM products 
INNER JOIN  
main_categories 
ON 
main_categories.id = ?
AND
 products.main_categorie_id = main_categories.id
INNER JOIN 
subcategories
ON
   subcategories.id = ?
 AND
  products.subcategory_id = subcategories.id
  INNER JOIN 
  users
  ON 
   products.user_id = users.id

    
       ");
       $data_types ='ii';
       $value_arr[] =  $idm;
       $value_arr[] = $ids ;
       $stmt->bind_param($data_types, ...$value_arr);
        // $stmt->bind_param('i', 'i', $idm  ,$ids); // bind the params per data type 
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