<?php

namespace Core\Controller;

use Core\Base\Controller;

use Core\Model\Main_categorie;
use Core\Helpers\Helper;

class Main_categories extends Controller
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
     * Gets all Main_categorie
     *
     * @return array
     */
    public function index()
    {
        
       $this->view = 'main_categories.index';
       $categorie = new Main_categorie ; // new model Main_categorie
       $selected_main_categorie = $categorie->get_all();
  
       
         // htmlspecialchars all Main_categorie
         $all_main_categories = array () ;
        $all = array () ;
          foreach ( $selected_main_categorie as   $categories) {
           
            
            foreach ($categories as $key => $categorie) {
              
              $all_main_categories[$key] = \htmlspecialchars($categorie);
            
           }
          
            $all[] = (object)$all_main_categories;
 
           
          }
        
          $this->data['all_main_categories'] = $all;
        

    }


      /**
     * Gets one Main_categorie
     *
     * @return array
     */
    public function single()
    {
        
        $this->view = 'main_categories.single';
        $categorie = new Main_categorie ; // new model Main_categorie
        $carent_categorie = $categorie->get_by_id($_GET['id']);
   
     
        $date = new \DateTime($carent_categorie->created_at);
        $carent_categorie->created_at = $date->format('d/M/Y');

       

     
         
         $all_categories = array () ;
          foreach ( $carent_categorie as $key =>  $categorie) {
 
            $all_categories[$key ] = \htmlspecialchars($categorie);
 
          }
  
         $this->data['categorie_one'] = (object)$all_categories;
         
       
       
      

    }



    /**
     * Display the HTML form for Main_categorie creation
     *
     * @return void
     */
    public function create()
    {
        

        $this->view = 'main_categories.create';
        
    }




    /**
     * Creates new Main_categorie
     *
     * @return void
     */
    public function store()
    {
      

    try {

        if(empty($_POST['name'])  ){
            throw new \Exception('You need to enter name  main categorie');
          
        }

        $categorie = new Main_categorie ; // new model Main_categorie
        
        $name_exist = $categorie->check_name_exist($_POST['name']);

        if ($name_exist) {
            echo "exists";
            throw new \Exception('The name you entered already exists');
    }

        $categorie->create($_POST);
        Helper::redirect('/main_categories');

    } catch (\Exception $error) {
        $_SESSION['main_categories']['create_main_categories'] =  $error->getMessage();
          
        Helper::redirect('/main_categories/create');
    }



    }

    


    /**
     * Display the HTML form for Main_categorie update
     *
     * @return void
     */
    public function edit()
    {
        
        $this->view = 'main_categories.edit';
        $categorie = new Main_categorie; // new model categorie
        $carent_categorie = $categorie->get_by_id($_GET['id']);
        
        $this->data['categorie_one'] = $carent_categorie;
        
    }





    /**
     * Updates the Main_categorie
     *
     * @return void
     */
    public function update()
    {
        
  
    try {
        if(empty($_POST['name'])  ){
            throw new \Exception('You need to enter name main categorie');
          
        }

        $categorie = new Main_categorie ; // new model Main_categorie
        
        $name_exist = $categorie->check_name_exist($_POST['name']);
     
     
        if ($name_exist) {
            echo "exists";
            throw new \Exception('The name you entered already exists');
        
            
        }
        $categorie->update($_POST);
            
        Helper::redirect('/main_categories');
        

    } catch (\Exception $error) {
        $_SESSION['main_categories']['create_main_categories'] =  $error->getMessage();
          
        Helper::redirect('/main_categories/edit');
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
            $this->view = 'main_categories.single';
            $categorie = new Main_categorie ; // new model Main_categorie
          
            $carent_categorie = $categorie->check_name_exist($_GET['name']);
            if (!$carent_categorie) {
                $_SESSION['categorie']['not_find_categorie'] = "The name you entered does not exist   ";
                Helper::redirect('/main_categories');
            }
            
            $date = new \DateTime($carent_categorie->created_at);
            $carent_categorie->created_at = $date->format('d/M/Y');
            
            $this->data['categorie_one'] = $carent_categorie;
            
           }else{
            $_SESSION['categorie']['not_find_categorie'] = "You must enter a name to search for it";
            Helper::redirect('/main_categories');
           }
        }
    
    
}