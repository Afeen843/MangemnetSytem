<?php
include_once('../config.in.php');
$_SESSION['name'] = $_POST['name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['username'] = $_POST['username'];
$_SESSION['mobile'] = $_POST['mobile'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['country'] = $_POST['country'];
$_SESSION['state']=$_POST['state'];
$_SESSION['zipcode']=$_POST['zipcode'];
$_SESSION['customergroup']=$_POST['customergroup'];
$_SESSION['status']=$_POST['status'];

if(isset($_POST['save'])) {
    $customers = new customers();
    $result = $customers->save($customers->tablename, ['name' => $_POST['name'], 'email' => $_POST['email'], 'mobile' => $_POST['mobile'],
        'city' => $_POST['city'], 'country' => $_POST['country'], 'zipcode' => $_POST['zipcode'], 'customer_group' => $_POST['customergroup']
        , 'status' => $_POST['status'], 'state' => $_POST['state']]);
    if ($result) {
        $_SESSION['message'] = "customer added successfully";
    } else {
        $_SESSION['message'] = "Something went wronged";
    }
    $url = $_SERVER['HTTP_REFERER'];
    header("location:$url");
    die;

}
?>
