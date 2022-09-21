<?php
include_once(__DIR__ . '/config.in.php');
?>
<div class="container"><h1> &#9755; Customers</h1></div>
<a href="admin.php?page=customers&action=add_customers"><button style="width: 15%"> Add customers </button></a>


<?php

$data = $_GET['data'];
$user = new users();
$offset = ($data - 1) * $user->limit;

//if(isset($_POST['limit']) && $_POST['limit'] !== 'all' ) {
//    $user = new Users();
//    $user->setlimit($limit);
//    $rows = $user->pagination('users', $offset);
//}
//elseif ($limit=="all"){
//
//    $rows=$user->select('users');
//}

    $rows = $user->pagination('customers', $offset);

?>

<table border="5px" width="100%">
    <thead>
    <tr>
        <th>Entity ID</th>
        <th> Name</th>
        <th> Email</th>
        <th> Mobile</th>
        <th> city</th>
        <th> Customers Group </th>
        <th>Status</th>
        <th> Action </th>
    </tr>
    </thead>
    <?php


    ?>
    <tbody>
    <?php



    if(count($rows) > 0){

        foreach($rows as $row){

            ?>

    <tr>
        <td> <?php echo $row['entity_id']?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['mobile'];?></td>
        <td><?php echo $row['city'];?></td>
         <td> <?php if($row['customer_group']==1)echo "Retail"; else echo "wholesale";?></td>
        <td><?php if($row['status']==1)echo "Active"; else echo "Deactivated";?></td>
        <td><a href="admin.php?page=customers&action=view&id=<?php echo $row['entity_id'];?>" >&#9738;</a> | <a href="admin.php?page=customers&action=edit&id=<?php echo $row['entity_id'];?>">&#9986;</a> | <a href="delete_customers.php?page=customers&action=delete&id=<?php echo $row['entity_id'];?>">&#9747;</a> </td>

    </tr>


<?php
        }
        }else{
    ?>
        <tr>

        <td colspan="7"> No users found</td>
          </tr>
    <?php
    }
    ?>

    </tbody>
</table><br>
<?php
$user = new users();
$user->GetCount('customers');
$selectedPage = $_GET['data'];
if($selectedPage > 1){
    ?>
    <diV class="pagination"> <a href="admin.php?page=customers&action=show_customers&data=<?php echo $selectedPage - 1; ?>"> &laquo;</a></diV>
    <?php
}
?>



<?php
for ($i = 1; $i <= $user->pages; $i++) {

    if($i==$selectedPage){
        $active='active';
    }else{
        $active='';
    }
    ?>
    <div class="center">
        <diV class="pagination">
            <a class="<?php echo $active; ?>" href="admin.php?page=customers&action=show_customers&data=<?php echo $i; ?>"> <?php echo $i; ?> </a>
        </diV>
    </div>
    <?php
}
?>
<?php
if($selectedPage!=$user->pages){
    ?>
    <div class="pagination">
        <a href="admin.php?page=page=customers&action=show_customers&data=<?php echo $selectedPage + 1; ?> "> &raquo;</a>
    </div>
    <?php
}
?>






