<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\Subcategorie;
use Core\Model\Main_categorie;
use Core\Helpers\Helper;

class Subcategories extends Controller
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

     
     /**
     * Gets all subcategories
     *
     * @return array
     */
    public function index()
    {
        
       $this->view = 'subcategories.index';
       $categorie = new Subcategorie ; // new model subcategorie
       $selected_subcategorie = $categorie->get_subcategories();
  
     
            
         // htmlspecialchars all subcategorie
        $all_subcategories = array () ;
        $all = array () ;
          foreach ( $selected_subcategorie as   $categories) {
           
            
            foreach ($categories as $key => $categorie) {
              
              $all_subcategories[$key] = \htmlspecialchars($categorie);
            
           }
          
            $all[] = (object)$all_subcategories;
 
           
          }
        
          $this->data['all_subcategories'] = $all;
        

    }


      /**
     * Gets one Subcategorie
     *
     * @return array
     */
    public function single()
    {
        
        $this->view = 'subcategories.single';
        $subcategory = new Subcategorie ; // new model Subcategorie
      
        $carent_subcategory = $subcategory->get_subcategories_by_id($_GET['id']);
 
        
        $date = new \DateTime($carent_subcategory->created_at);
        $carent_subcategory->created_at = $date->format('d/M/Y');

       

     
          
         $all_subcategories = array () ;
          foreach ( $carent_subcategory as $key =>  $subcategory) {
 
            $all_subcategories[$key ] = \htmlspecialchars($subcategory);
 
          }
  
         $this->data['subcategory_one'] = (object)$all_subcategories;
         
       
       
      

    }



    /**
     * Display the HTML form for subcategorie creation
     *
     * @return void
     */
    public function create()
    {
        
        $categorie = new Main_categorie ; // new model Main_categorie
        $selected_main_categorie = $categorie->get_all();
        $this->data['all_main_categories'] = (object)$selected_main_categorie;
     
        $this->view = 'subcategories.create';
        
    }




    /**
     * Creates new subcategorie
     *
     * @return void
     */
    public function store()
    {
        

    try {

   
        if(empty($_POST['id'])  || empty($_POST['name']) ){
            throw new \Exception('You need to enter some informations');
          
        }

        $subcategory = new Subcategorie ; // new model Subcategorie
        
        $name_exist = $subcategory->check_name_exist($_POST['name']);

        if ($name_exist) {
           
            throw new \Exception('The subcategory name you entered already exists');
    }

    $_POST['name_sub'] = $_POST['name'];
    $_POST['main_categorie_id'] = $_POST['id'];

    unset($_POST['name'],$_POST['id']); // destroys 
    
  
        $subcategory->create($_POST);
        
        Helper::redirect('/subcategories');

    } catch (\Exception $error) {
        $_SESSION['subcategories']['create_subcategories'] =  $error->getMessage();
          
        Helper::redirect('/subcategories/create');
    }



    }

    


    /**
     * Display the HTML form for subcategories update
     *
     * @return void
     */
    public function edit()
    {
       

        $this->view = 'subcategories.edit';
        $subcategory = new Subcategorie ; // new model Subcategorie
       
        $carent_subcategory = $subcategory->get_subcategories_by_id($_GET['id']);
        
        $categorie = new Main_categorie ; // new model Main_categorie
        $selected_main_categorie = $categorie->get_all_main_categories_except_one($carent_subcategory->main_categorie_id);
       
        $this->data['all_main_categories'] = (object)$selected_main_categorie;
        $this->data['subcategory_one'] = $carent_subcategory;
      
    }





    /**
     * Updates the subcategories
     *
     * @return void
     */
    public function update()
    {
        
        

        try {

        if(empty($_POST['idm'])  || empty($_POST['name']) ){
            throw new \Exception('You need to enter some informations');
          
        }

        $subcategory = new Subcategorie ; // new model Subcategorie
        
    
      
    $_POST['name_sub'] = $_POST['name'];
    $_POST['main_categorie_id'] = $_POST['idm'];
    
    unset($_POST['name'],$_POST['idm']); // destroys 

        $subcategory->update($_POST);
        Helper::redirect('/subcategory?id='.  $_POST['id']);
        
        

    } catch (\Exception $error) {
        $_SESSION['subcategories']['create_subcategories'] =  $error->getMessage();
        Helper::redirect('/subcategories/edit?id=' .  $_POST['id']);
        
    }
       


    }



   



     /**
     * find user by email
     *
     * @return array
     */
        public function find_categorie()
        {
       
            if(!empty($_GET['name'])){
            $this->view = 'subcategories.single';
            $subcategory = new Subcategorie ; // new model Subcategorie
            
            $carent_categorie = $subcategory->check_name_exist($_GET['name']);
            if (!$carent_categorie) {
                $_SESSION['categorie']['not_find_categorie'] = "The name you entered does not exist   ";
                Helper::redirect('/subcategories');
            }
            
            $date = new \DateTime($carent_categorie->created_at);
            $carent_categorie->created_at = $date->format('d/M/Y');
            
            Helper::redirect('/subcategory?id=' .  $carent_categorie->id);
            
           }else{
            $_SESSION['categorie']['not_find_categorie'] = "You must enter a name to search for it";
            Helper::redirect('/subcategories');
           }
        }
    
    
}