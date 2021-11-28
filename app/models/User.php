<?php

  class User {
    private $db;
    
    public function __construct(){
      $this->db = new Database;
    } 

    // register new user
    public function register($data){
      $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // find user by email
    public function findUserByEmail($email){
      $this->db-> query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);
      
      $row = $this->db->single();

      // Check for the row containing the email from the user input
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }

    }

  }

?>