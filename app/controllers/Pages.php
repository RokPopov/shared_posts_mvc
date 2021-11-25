<?php
  class Pages extends Controller {
    public function __construct(){
      
    }

    public function index(){
      $data = [
        'title' => 'SharePosts',
        'description' => 'Small social network built on top of RokMVC Framework'
      ];
      
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to share posts with your friends no matter where you are'
      ];
      $this->view('pages/about', $data);
    }
  }