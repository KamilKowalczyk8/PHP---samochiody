<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['password']);
  header("Location: http://localhost/jdj/Kamil/konta.php");  
?>