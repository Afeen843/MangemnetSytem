<?php
include_once('../config.in.php');

$_SESSION['name'] = $_POST['name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['mobile'] = $_POST['mobile'];
$_SESSION['conf_password'] = $_POST['conf_password'];
$url = $_SERVER['HTTP_REFERER'];
if (isset($_POST['save'])) {

    if ($_POST['password'] != $_POST['conf_password']) {
        $_SESSION['message'] = "Password does not match";
        header("location:$url");
        exit();
    }

    $user = new Users;
    $result = $user->save($user->tablename, ['name' => $_POST['name'], 'username' => $_POST['username'], 'email' => $_POST['email'], 'mobile' => $_POST['mobile'], 'password' => $_POST['name'], 'status' => $_POST['status']]);
    if ($result) {
        $_SESSION['message'] = "User Added successfully";
    } else {
        $_SESSION['message'] = "Something went wrong";
    }


    header("location:$url");
    die;


}

?>
