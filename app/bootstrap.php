<?php
  // Load Config
  require_once 'config/config.php';

  // Autoload CORE libraries
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });