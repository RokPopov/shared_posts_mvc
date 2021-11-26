<?php
  class Users extends Controller {
    public function __construct(){

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
      }

      // validate password
      if(empty($data['password'])){
        $data['password_err'] = "Enter your password";
      } elseif(strlen($data['password']) < 6){
        $data['password_err'] = 'Password must be at least 6 characters long';
      }

      // validate password confirmation
      if(empty($data['confirm_password'])){
        $data['email_err'] = "Confirm your password";
      } else {
        if($data['password'] != $data['confirm_password']){
          $data['confirm_password_err'] = "Passwords don't match";
        }
      }

      // make sure error variables have no values
      if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
        // Validated
        die('Great success!!!');
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

      // make sure errors are empty
      if(empty($data['email_err']) && empty($data['password_err'])){
        die('Great success!!!');
      } else {
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
  }


?>