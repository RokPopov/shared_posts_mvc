<?php
  class Users extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function register(){
      // check type of req
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
      //  process form

      // sanitize the POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // initialize data
      $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']), 
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err'
      ];

      // validate name
      if(empty($data['name'])){
        $data['name_err'] = "Enter your name";
      }

      // validate email
      if(empty($data['email'])){
        $data['email_err'] = "Enter your email address";
      } else {
        // check if email exists in db
        if($this->userModel->findUserByEmail($data['email'])){
          $data['email_err'] = "Use a non-existing email";
        }
      }

      // validate password
      if(empty($data['password'])){
        $data['password_err'] = "Enter your password";
      } elseif(strlen($data['password']) < 6){
        $data['password_err'] = 'Password must be at least 6 characters long';
      }

      // validate password confirmation
      if(empty($data['confirm_password'])){
        $data['confirm_password_err'] = "Confirm your password";
      } else {
        if($data['password'] != $data['confirm_password']){
          $data['confirm_password_err'] = "Passwords don't match";
        }
      }

      // make sure error variables have no values
      if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
        // hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // register user
        if($this->userModel->register($data)){
          flash('register_success', 'Great success! You are now registered!');
          redirect('users/login');
        } else {
          die('Too bad so sad.');
        }
      } else {
        // Load view with errors
        $this->view('users/register', $data);
      }
        
    }  else {
        // create variables for storing data if form gets rerendered - initialize data 
        $data = [
          'name' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err'
        ];

        // load view
        $this->view('users/register', $data);
      }
    }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form

        // sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // init data
        $data =[    
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',        
        ];

        // validate email address
        if(empty($data['email'])){
          $data['email_err'] = 'Enter your email address';
        }

        // validate password
        if(empty($data['password'])){
          $data['password_err'] = 'Enter your password';
        } 

        // check for user/email
      if($this->userModel->findUserByEmail($data['email'])){
        // user found 
       } else {
         // user not found
        $data['email_err'] = "User not found";
      }

      // make sure errors are empty
      if(empty($data['email_err']) && empty($data['password_err'])){
        // validated
        // check and set logged-in user
        $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Password incorrect';

            $this->view('users/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }

    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name;
      redirect('pages/index');
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
    }

    public function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true;
      } else {
        return false;
      }
    }
    
  }

  ?>