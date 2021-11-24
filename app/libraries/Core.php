<?php
  /* App core class
    Creates URL & loads core controller
    URL format - controller/methods/params
  */ 

  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      // print_r($this->getUrl()) ;

      $url = $this->getUrl();

      // look into controllers for the first value 
      if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
        // if the file exists, set as controller  
        $this->currentController = ucwords($url[0]);
        // unset 0 index
        unset($url[0]);
      }

        // require the controller
        require_once '../app/controllers/'. $this->currentController . '.php';

      // instantiate controller class
      $this->currentController = new $this->currentController;

      // check for second param of the URL
      if(isset($url[1])){
        // check if the method exists in the controller
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];
          // unset index 1
          unset($url[1]);
        }
        
      }

      // get params
      $this->params = $url ? array_values($url) : [];

      // call a callback that returns an array with params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;  
      }
    }
  } 