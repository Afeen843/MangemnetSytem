<?php
include_once(__DIR__ . '/config.in.php');

?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <link rel="stylesheet" href="css/form.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>
<body>

<div id="header">
    <div style="text-align: center;"><strong>TEKHQS MANGEMENT SYETEM </strong></div>
</div>


<form action="controller/auth.php" method="post" onsubmit="return validate();">
    <div class="container">
        <label for="name"><b>User name</b>:</label><br>
        <input type="text" id="userName" name="userName" placeholder="Enter your username"><br>
    </div>
    <div class="container">
        <label for="pwd"><b>Password:</b></label><br>
        <input type="password" id="password" name="password" placeholder="Enter your password"> <br>
    </div>
    <div>
        <button type="submit"> Login</button>
    </div>
</form>


<script>
    function validate() {

        let $status = true;
        let username = document.getElementById('userName').value;
        let password = document.getElementById('password').value;
        if(username==""){
            document.getElementById('userName').innerHTML="required";
            $status=false;
        }
        if(password==""){
            document.getElementById('password').innerHTML="required";
            $status=false;
        }
        return $status;
    }
</script>


<body>
</html>
