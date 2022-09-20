<?php

include_once('config.in.php');


$url = $_SERVER['HTTP_REFERER'];
$user = new Users();
$action = $_GET['action'];
$id = $_GET['id'];
$user->delete('customers', $id);
header("location:$url");
die;



?>