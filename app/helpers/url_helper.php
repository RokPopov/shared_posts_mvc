<?php 

// page redirect helper
function redirect($page){
  header('location:' . URLROOT . '/' . $page);
}

?>