<?php

include_once('../config.in.php');

if (isset($_POST['update'])) {

    $user = new Users();
    $result = $user->update('customers', ['name' => $_POST['name'], 'email' => $_POST['email'], 'mobile' => $_POST['mobile'], 'city'=>$_POST['city'] , 'country'=>$_POST['country'], 'state'=>$_POST['state'],'zipcode'=>$_POST['zipcode'], 'created_at'=>$_POST['created_at'], 'status' => $_POST['status']], $_POST['id']);
    if ($result) {
        $_SESSION['message'] = "Customer edited successfully";
    } else {
        $_SESSION['message'] = "Something went wrong";
    }
    $url = $_SERVER['HTTP_REFERER'];
    header("location:$url");
    die;
}



