<?php
include_once('config.in.php');
$id = $_GET['id'];
?>
<html>

<body>
<div class="container"><h1> &#9755; Customers</h1></div>
<table class="container" style="border: 5px solid darkred; padding:5px; " >

    <?php
    $user = new users();
    $rows = $user->selectuser('customers', $id);
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
        <th> City</th>
        <td><?php echo $row['city']; ?></td>
    </tr>
    <tr>
        <th> country</th>
        <td><?php echo $row['country']; ?></td>
    </tr>
    <tr>
        <th> state</th>
        <td><?php echo $row['state']; ?></td>
    </tr>
    <tr>
        <th>zipcode</th>
        <td><?php echo $row['zipcode']; ?></td>
    </tr>
    <tr>
        <th> Customers group</th>
        <td><?php if($row['customer_group']==1)echo "Retail"; else echo "wholesale";?></td>
    </tr>
    <tr>
    <th> Created At</th>
    <td><?php echo $row['created_at']; ?></td>
    </tr>
    <tr>
        <th> Modified</th>
        <td><?php echo $row['modified_at']; ?></td>
    </tr>
    <tr>
        <th> Status</th>
        <td><?php if($row['status']==1)echo "Active"; else echo "Deactivated";?></td>
    </tr>
</table>


<?php
}
?>


</body>
</html>

