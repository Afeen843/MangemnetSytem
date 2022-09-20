<?php
include_once(__DIR__ . '/config.in.php');
?>
<div class="container"><h1> &#9755; Customers</h1></div>
<a href="admin.php?page=customers&action=add_customers"><button style="width: 15%"> Add customers </button></a>


<table border="5px" width="100%">
    <thead>
    <tr>
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
    $customer=new users();
    $rows=$customer->select( 'customers');


    if(count($rows) > 0){

        foreach($rows as $row){

            ?>

    <tr>

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




</table>






