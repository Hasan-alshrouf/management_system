<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\User;
use Core\Helpers\Helper;

class Users extends Controller
{

    
    protected $http_code = 200;
    protected $request_body;


    protected $response_schema = array(
        "success" => true, // to privde the response status
        "message_code" => "",
        "body" =>  []
    );

     public function render()
     {
        if (!empty($this->view))
        $this->view();
        elseif(!empty($this->response_schema['body'])){
           header("Content-Type: application/json");
           http_response_code($this->http_code);
           echo json_encode($this->response_schema);

        }
     }

     function __construct()
     {
             $this->auth();
             $this->request_body = (array) json_decode(file_get_contents("php://input" ));
           
     }


     /**
     * Gets all users
     *
     * @return array
     */
    public function index()
    {
        
       $this->view = 'users.index';
       $user = new User; // new model user
       $selected_users = $user->get_all();
  
       
         // htmlspecialchars all users
         $all_users = array () ;
        $all = array () ;
          foreach ( $selected_users as   $users) {
           
            
            foreach ($users as $key => $user) {
              
              $all_users[$key] = \htmlspecialchars($user);
            
           }
          
            $all[] = (object)$all_users;
 
           
          }
        
          $this->data['users'] = $all;
         
      
          

    }


    /**
     * Gets one users
     *
     * @return array
     */
    public function single()
    {
        
        $this->view = 'users.single';
        $user = new User; // new model user
        $carent_user = $user->get_by_id($_GET['id']);
   
        
        $date = new \DateTime($carent_user->created_at);
        $carent_user->created_at = $date->format('d/M/Y');

       

     
          // htmlspecialchars all item
         $all_users = array () ;
          foreach ( $carent_user as $key =>  $user) {
 
            $all_users[$key ] = \htmlspecialchars($user);
 
          }
        
         $this->data['user_one'] = (object)$all_users;
         
       
       
      

    }




    /**
     * Display the HTML form for user creation
     *
     * @return void
     */
    public function create()
    {
        

        $this->view = 'users.create';
        
    }




    /**
     * Creates new user
     *
     * @return void
     */
    public function store()
    {
        
    try {

        if(empty($_POST['email']) || empty($_POST['full_name']) ||  empty($_POST['password']) || empty($_POST['address']) ){
            throw new \Exception('You need to enter some information');
          
        }

        $user = new User; // new model user
        $_POST['password'] = \password_hash($_POST['password'], \PASSWORD_DEFAULT); //encryption
       
      
        $user->create($_POST);
        Helper::redirect('/users');

    } catch (\Exception $error) {
        $_SESSION['user']['create_users'] =  $error->getMessage();
          
        Helper::redirect('/users/create');
    }



    }

    


    /**
     * Display the HTML form for user update
     *
     * @return void
     */
    public function edit()
    {
        
        $this->view = 'users.edit';
        $user = new User; // new model user
        $carent_user = $user->get_by_id($_GET['id']);
        
        $this->data['user_one'] = $carent_user;
        
    }





    /**
     * Updates the user
     *
     * @return void
     */
    public function update()
    {
      

        
        
    try {
        if(empty($_POST['email']) || empty($_POST['full_name']) ||  empty($_POST['mobile_number']) || empty($_POST['address']) ){
            throw new \Exception('You need to enter some information');
          
        }

        $user = new User; // new model user
     
    
        
        $user->update($_POST);
        
        Helper::redirect('/user?id='.$_POST['id']);
        

    } catch (\Exception $error) {
        $_SESSION['user']['create_users'] =  $error->getMessage();
          
        Helper::redirect('/users/edit?id=' .$_POST['id']);
    }
       


    }



    /**
     * Delete the user
     *
     * @return void
     */
    public function status()
    {
        
        
        try {
                        
                    
            $id = $this->request_body['id'];
            $user = new User; // new model user
              
            if (empty($id)) {
                   $this->http_code = 422;
                   throw new \Exception('user_id_not_found!');
             
           }
           $user_one = $user->get_by_id($id);
          if( $user_one->status == 1) {
            $num = 0;
            $user->status($id ,$num);
           }else{
            $num = 1;
            $user->status($id ,$num);
           }
           


           $this->response_schema['body'][] =  $user_one;
           $this->response_schema['message_code']= "done";


            }catch (\Exception $error) {
                   $this->response_schema['success'] = false;
                   $this->response_schema['message_code'] = $error->getMessage();
   
    

            }
       
     
    }




     /**
     * find user by email
     *
     * @return array
     */
        public function find_user()
        {
            
            if(!empty($_GET['email'])){
            $this->view = 'users.single';
            $user = new User; // new model user
          
            $carent_user = $user->check_email($_GET['email']);
            if (!$carent_user) {
                $_SESSION['user']['not_find_user'] = "The email you entered does not exist   ";
                Helper::redirect('/users');
            }
            
            $date = new \DateTime($carent_user->created_at);
            $carent_user->created_at = $date->format('d/M/Y');
            
           
            $this->data['user_one'] = $carent_user;
           }else{
            $_SESSION['user']['not_find_user'] = "You must enter a email to search for it";
            Helper::redirect('/users');
           }
        }
    
    
}