<?php
include_once('config.in.php');
$id = $_GET['id'];
?>
<html>

<body>
<div class="container"><h1> &#9755; Users</h1></div>
<table class="container" style="border: 5px solid darkred; padding:5px; " >

    <?php
    $user = new users();
    $rows = $user->selectuser('users', $id);
    foreach ($rows as $row){
    ?>
    <tr>
        <th> Entity ID</th>
        <td><?php echo $row['entity_id']; ?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?php echo $row['name']; ?></td>
    </tr>
    <tr>
        <th> Email</th>
        <td><?php echo $row['email']; ?></td>
    </tr>
    <tr>
        <th> Username</th>
        <td><?php echo $row['username']; ?></td>
    </tr>
    <tr>
        <th> Password</th>
        <td><?php echo $row['password']; ?></td>
    </tr>
    <tr>
        <th> mobile</th>
        <td><?php echo $row['mobile']; ?></td>
    </tr>
    <tr>
        <th> Status</th>
        <td><?php if($row['status']==1)echo "Active"; else echo "Deactivated";?> </td>
    </tr>
    <tr>
        <th> Login Attempts</th>
        <td><?php echo $row['login_attempts']; ?></td>
    </tr>
    <tr>
        <th>Role</th>
        <td><?php echo $row['role']; ?></td>
    </tr>
    <tr>
        <th> User ip</th>
        <td><?php echo $row['user_ip']; ?></td>
    </tr>
    <tr>
    <th> Created At</th>
    <td><?php echo $row['created_at']; ?></td>
    </tr>
    <tr>
        <th> Modified</th>
        <td><?php echo $row['modified_at']; ?></td>
    </tr>
</table>


<?php
}
?>


</body>
</html>
