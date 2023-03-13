<?php

namespace Core\Model;

use Core\Base\Model;

class User extends Model
{


   


    public function check_email(string $email)
    {
        $result = $this->connection->query("SELECT * FROM $this->table WHERE email='$email'");
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


    public function status(int $id , int $num)
    {
         $this->connection->query("UPDATE users SET status=$num WHERE id=$id");
       
    }


    




   
}