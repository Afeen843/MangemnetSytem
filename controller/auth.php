<?php
include_once('../classes/session.php');
$auth = new Session();
$auth->setUserName($_POST['userName']);
$auth->setPassword($_POST['password']);
$auth->auth();
if ($auth->valid) {

    header('location:../admin.php');
} else {

    header('location:../index.php');
}
?>