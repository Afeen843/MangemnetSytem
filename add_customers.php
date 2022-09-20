<?php
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
$name=$_SESSION['name'];
$email=$_SESSION['email'];
$username=$_SESSION['username'];
$state=$_SESSION['state'];
$city=$_SESSION['city'];
$country=$_SESSION['country'];
$zipcode=$_SESSION['zipcode'];
$customergroup=$_SESSION['customergroup'];
$mobile=$_SESSION['mobile'];
$message=$_SESSION['message'];

if(isset($_SESSION) && !isset($_POST['save'])){
  session_unset();
}
?>

<span> <?php echo $message;?>   </span>
<form action="controller/add_customers.php" method="post" enctype="multipart/form-data">

<div class="container">
    <label for="name" ><b>Name</b>:</label><br>
    <input type="text" name="name" placeholder="Enter customer Name" value="<?php echo $name;?>"  required /> <br>
</div>
<div class="container">
    <label for="Email"><b>Email:</b></label><br>
    <input type="email" name="email" placeholder="Enter customer Email" value="<?php echo $email;?>" required/> <br>
</div>

<div class="container">
    <label for="username"><b>User Name:</b></label><br>
    <input type="text" name="username" placeholder="Enter customer UserName" value="<?php echo $username;?>" required/> <br>
</div>
<div class="container">
    <label for="city"><b>city:</b></label><br>
    <input type="text" id="city" name="city" placeholder="Enter city name" value="<?php echo $city;?>"  required/> <br>
</div>
<div class="container">
    <label for="country"><b>Country:</b></label><br>
    <input  type="text" id="country" name="country"  placeholder="Confirm country name" value="<?php echo $country;?>" /> <br>
    <span id="message">  </span>
</div>
    <div class="container">
        <label for="state"><b>State:</b></label><br>
        <input  type="text" id="state" name="state"  placeholder="enter your state name" value="<?php echo $state;?>"  /> <br>
    </div>

    <div class="container">
        <label for="state"><b>Zipcode:</b></label><br>
        <input  type="text" id="zipcode" name="zipcode"  placeholder="enter the zip code" value="<?php echo $zipcode;?>"  /> <br>
    </div>
    <div class="container">
        <label for="state"><b>Customer Group:</b></label><br>
        <input  type="text"  name="customergroup"  placeholder="Add the cuntomers group"  value="<?php echo $customergroup;?>" /> <br>
    </div>

<div class="container">
    <label for="Mobile"><b>Mobile:</b></label><br>
    <input type="text" name="mobile" placeholder="Enter your Mobile Number" value="<?php echo $mobile;?>"  required/> <br>
</div>
<div class="container">
    <label for="Status"><b>Status:</b></label><br>
    <select name="status">
        <option value="1">Active</option>
        <option value="2">Not Active</option>
        <select>

</div><br>


<diV>
    <input type="submit" value="Save" name="save"  style="width:20px height:20px">

</div>
</form>
