<?php

namespace Core\Base;
use Core\Model\User;
use Core\Helpers\Helper;


abstract class Controller 
{
    abstract public function render();


    protected $view =null ;  
    protected $data = array() ; 

    protected function  view()
    {
        new View ($this->view , $this->data);
    }


    
// Verify that the user login
    protected function auth()
    {
        if (!isset($_SESSION['user'])) {
            Helper::redirect('/');
        }
    }

    


}