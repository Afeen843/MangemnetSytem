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
<form action="controller/edit_customers.php" method="post" enctype="multipart/form-data" >
    <?php
    $id = $_GET['id'];
    $user = new users();
    $rows = $user->selectuser('customers', $id);

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
        <label for="city"><b>City:</b></label><br>
        <input type="text" name="city"  value=<?php echo $row['city']; ?>> <br>
    </div>


    <div class="container">
        <label><b>Country:</b></label><br>
        <input type="text" name="country" value=<?php echo $row['country']; ?>> <br>
    </div>

    <div class="container">
        <label><b>State:</b></label><br>
        <input type="text" name="state" value=<?php echo $row['state']; ?>> <br>
    </div>

    <div class="container">
        <label><b>Zip code:</b></label><br>
        <input type="text" name="zipcode"  value=<?php echo $row['zipcode']; ?>> <br>
    </div>

    <div class="container">
        <label><b>Created at:</b></label><br>
        <input type="text" name="created_at"  value=<?php echo $row['created_at']; ?>> <br>
    </div>
    <div class="container">
        <label><b>modified at:</b></label><br>
        <input type="text" id="pwd" name="modified_at" value=<?php echo $row['modified_at']; ?>> <br>
    </div>


    <div class="container">
        <label for="Status"><b>Status:</b></label><br>
        <select name="status"  value=<?php echo $row['status']; ?>>
            <option value="1">Active</option>
            <option value="2">Not Active</option>
            <select>
    </div>

        <input type="hidden" name="id" value=<?php echo $row['entity_id']; ?>>

    <diV>
        <input type="submit" value="update" name="update" style="width:20px height:20px">
    </div>
</form>

    <?php
}
?>
