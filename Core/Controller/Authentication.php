<?php



namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\User;




class Authentication extends Controller
{
      

        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        function __construct()
        {
                
        }

        /**
         * Displays login form
         *
         * @return void
         */
        public function login()
        {
                $this->view = 'login';
        }

        /**
         * Login Validation
         *
         * @return void
         */
        public function validate()
        {
         
                $user = new User();
                $logged_in_user = $user->check_email($_POST['email']);

                
                if (!$logged_in_user) {
                        $this->invalid_redirect();
                }

                if ($logged_in_user->status == 0) {
                        $this->invalid_redirect();
                }
               
                if (!\password_verify($_POST['password'], $logged_in_user->password)) {
                        $this->invalid_redirect();
                }

                
             
                

                $_SESSION['user'] = array(
                        'full_name' => $logged_in_user->full_name,
                        'user_id' => $logged_in_user->id,
                       
                );

                
              

                // $this->view = 'users.dashboard';
                
                 Helper::redirect('dashboard');
                
                    
        }

        public function logout()
        {
                \session_destroy();
      
                Helper::redirect('/');
        }

        private function invalid_redirect()
        {
                $_SESSION['error'] = "Invalid  Email or Password ";
              
                Helper::redirect('/');
                exit;
        }
}