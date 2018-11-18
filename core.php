<?php
session_start();
ob_start();

function loggedin(){
  if(isset($_SESSION['login_user'])&&!empty($_SESSION['login_user']))
    return true;
  else
    return false;
}
 ?>
