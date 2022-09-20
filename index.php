<?php
include_once (__DIR__.'/config.in.php');

?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>

<div id="header">
    <div style="text-align: center;"> <strong>TEKHQS MANGEMENT SYETEM </strong> </div>
</div><br><br>


<form action="" method="post">
        <div class="container">
        <label for="name"><b>First name</b>:</label><br>
        <input type="text" id="name" name="name" placeholder="Enter your username" ><br>
</div>
<div class="container">
    <label for="pwd">Password:</label><br>
    <input type="password" id="pwd" name="pwd" placeholder="Enter your password"> <br>
</div>
    <div>
    <button type="submit"> submit </button>
        </div>
</form>

<body>
</html>
