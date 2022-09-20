<?php
include_once(__DIR__ . '/config.in.php');
include_once('admin.php');
ini_set('error_reporting', 0);
ini_set('display_errors', 0);

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$mobile = $_SESSION['mobile'];
$message = $_SESSION['message'];
$conf_password = $_SESSION['conf_password'];

if (isset($_SESSION) && !isset($_POST['save'])) {
    session_unset();
}

?>

<h2> Add User</h2>
<form action="controller/add_user.php" method="post" >
    <span id="message"><?php echo $message; ?></span>
    <div class="container">
        <label for="name"><b>Name</b>:</label><br>
        <input type="text" name="name" placeholder="Enter your name" value="<?php echo $name; ?>" required/> <br>
    </div>
    <div class="container">
        <label for="Email"><b>Email:</b></label><br>
        <input type="email" name="email" placeholder="Enter your Email" value="<?php echo $email; ?>" required/> <br>
    </div>

    <div class="container">
        <label for="username"><b>User Name:</b></label><br>
        <input type="text" name="username" placeholder="Enter your UserName" value="<?php echo $username; ?>" required/>
        <br>
    </div>
    <div class="container">
        <label for="pwd"><b>Password:</b></label><br>
        <input type="password" id="password" name="password" placeholder="Enter your password"/> <br>
    </div>
    <div class="container">
        <label for="Cpd"><b>Confirm Password:</b></label><br>
        <input type="password" id="confirm" name="conf_password" onclick="verify()"
               placeholder="Confirm your password"/> <br>

    </div>

    <div class="container">
        <label for="Mobile"><b>Mobile:</b></label><br>
        <input type="text" name="mobile" placeholder="Enter your Mobile Number" value="<?php echo $mobile; ?>"
               required/> <br>
    </div>
    <div class="container">
        <label for="Status"><b>Status:</b></label><br>
        <select name="status">
            <option value="1">Active</option>
            <option value="2">Not Active</option>
            <select>

    </div>
    <br>

    <div id="hello"><input type="submit" value="Save" name="save" id="button"></div>
</form>


<script type="text/javascript" src="js/script.js">
    $("button").onclick(function () {
        $("hello").hide();
    });
</script>

</body>
</html>



