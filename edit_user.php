<?php
include_once(__DIR__ . '/config.in.php');
ini_set('error_reporting', 0);
ini_set('display_errors', 0);

$message=$_SESSION['message'];
if(isset($_SESSION) && !isset($_POST['update'])){
    session_unset();
}
?>

    <span> <?php echo $message?> </span>
<form action="controller/edit_user.php" method="post" enctype="multipart/form-data" >
    <?php
    $id = $_GET['id'];
    $user = new users();
    $rows = $user->selectuser('users', $id);

    foreach ($rows as $row) {
    ?>

    <div class="container">
        <label for="name"><b>Name</b>:</label><br>
        <input type="text" name="name" value=<?php echo $row['name']; ?>><br>
    </div>
    <div class="container">
        <label for="Email"><b>Email:</b></label><br>
        <input type="email" name="email"   value=<?php echo $row['email']; ?> <br>
    </div>

    <div class="container">
        <label for="username"><b>User Name:</b></label><br>
        <input type="text" name="username"  value=<?php echo $row['username']; ?>> <br>
    </div>
    <div class="container">
        <label for="pwd"><b>Password:</b></label><br>
        <input type="password" id="pwd" name="password" value=<?php echo $row['password']; ?>> <br>
    </div>

    <div class="container">
        <label for="Mobile"><b>Mobile:</b></label><br>
        <input type="text" name="mobile"  value=<?php echo $row['mobile']; ?>> <br>
    </div>
    <div class="container">
        <label for="Status"><b>Status:</b></label><br>
        <select name="status"  value=<?php echo $row['status']; ?>>
            <option value="1">Active</option>
            <option value="2">Not Active</option>
            <select>

    </div>

    <div class="container">
        <label><b>Login Attempts:</b></label><br>
        <input type="text" name="login_attempts" value=<?php echo $row['login_attempts']; ?>> <br>
    </div>

    <div class="container">
        <label><b>Role:</b></label><br>
        <input type="text" name="role" value=<?php echo $row['role']; ?>> <br>
    </div>

    <div class="container">
        <label><b>User IP:</b></label><br>
        <input type="text" name="user_ip"  value=<?php echo $row['user_ip']; ?>> <br>
    </div>

    <div class="container">
        <label><b>Created at:</b></label><br>
        <input type="text" name="created_at"  value=<?php echo $row['created_at']; ?>> <br>
    </div>
    <div class="container">
        <label><b>modified at:</b></label><br>
        <input type="text" id="pwd" name="modified_at" value=<?php echo $row['modified_at']; ?>> <br>
    </div>

        <input type="hidden" name="id" value=<?php echo $row['entity_id']; ?>>

    <diV>
        <input type="submit" value="update" name="update" style="width:20px height:20px">
    </div>
</form>

    <?php
}
?>