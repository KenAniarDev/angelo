<?php
    session_start(); 
    if(!$_SESSION['isLoggedIn']){ 
        header("Location: login.php"); 
        exit; 
    } 
    if(isset($_GET['logout'])) {
      $_SESSION['isLoggedIn'] = false;
      header("Location: login.php"); 
    }
?>