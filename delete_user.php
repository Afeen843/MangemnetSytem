<?php
include_once ('config.in.php');


$url= $_SERVER['HTTP_REFERER'];
$user=new Users();
$action=$_GET['action'];
$id=$_GET['id'];
$user->delete('users',$id);
header("location:$url");die;


?>

