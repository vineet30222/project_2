<?php
$host='localhost';
$db='nostalgia';
$user='root';
$pass='';

  if(!$link=mysqli_connect($host,$user,$pass,$db)){
    echo 'Error';
  }
?>
