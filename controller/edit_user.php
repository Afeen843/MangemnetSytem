<?php
include_once ('../config.in.php');

if (isset($_POST['update'])){

    $user = new Users();
    $result=$user->update('users', ['name' => $_POST['name'], 'username' => $_POST['username'], 'email' => $_POST['email'], 'mobile' => $_POST['mobile'], 'password' => $_POST['password'],'role'=>$_POST['role'], 'login_attempts'=>$_POST['login_attempts'],'user_ip'=>$_POST['user_ip'] ,'status' => $_POST['status']],$_POST['id']);
    if($result){
        $_SESSION['message']="User edit successfully";
    }else{
        $_SESSION['message']="Something went wrong";
    }
    $url= $_SERVER['HTTP_REFERER'];
    header("location:$url");die;
}


?>