<?php
  class Users extends Controller {
    public function __construct(){

    }

    public function register(){
      // check type of req
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
      //  process form
        
      } else {
        // create variables for storing data if form gets rerendered - initialize data 
        $data = [
          'name' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'name_error' => '',
          'password_error' => '',
          'confirm_password_error'
        ];

        // load view
        $this->view('users/register', $data);
      }
    }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
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