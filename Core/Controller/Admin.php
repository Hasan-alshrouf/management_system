<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\User;
use Core\Model\Subcategorie;
use Core\Model\Product;
use Core\Model\Main_categorie;

class Admin extends Controller
{
        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        function __construct()
        {
                $this->auth();
               
        }

        public function index()
        {
                $user = new User; // new model user
                $this->data['count_user'] = count($user->get_all());

                $Product = new Product; // new model Product\
                $this->data['Product'] = count($Product->get_all());

                $Subcategorie = new Subcategorie; // new model Subcategorie
                $this->data['Subcategorie'] = count($Subcategorie->get_all());

                $Main_categorie = new Main_categorie; // new model Subcategorie
                $this->data['Main_categorie'] = count($Main_categorie->get_all());

                
                
                $this->view = 'users.dashboard';
        }
              
             
}