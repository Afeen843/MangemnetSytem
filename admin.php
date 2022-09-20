<?php
include_once(__DIR__ . '/config.in.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin.css?<?php echo time(); ?>" />
    <script type="text/javascript" src="js/script.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<?php
$page='';
$action='';
if(isset($_GET['page'])&& isset($_GET['action'])){
    $page=$_GET['page'];
    $action=$_GET['action'];
}

$menuItems = [
    'dashboard' => [
        'id' => 'dashboard',
        'url_key' => 'dashboard',
        'title' => 'Dashboard',
        'url' => 'admin.php?page=dashboard&action=dashboard',
        'target' => '_parent',
        'file_name' => 'dashboard.php'
    ],
    'admin_users' => [
        'id' => 'admin_users',
        'url_key' => 'users',
        'title' => 'Admin Users',
        'url' => 'admin.php?page=users&action=show_all&data=1',
        'target' => '_parent'
    ],
    'our_customers' => [
        'id' => 'our_customers',
        'url_key' => 'customers',
        'title' => 'Our Customers',
        'url' => 'admin.php?page=customers&action=show_customers',
        'target' => '_parent'
    ],

    'our_categories' => [
        'id' => 'our_categories',
        'url_key' => 'categories',
        'title' => 'Our Categories',
        'url' => 'admin.php?page=categories&action=show_all',
        'target' => '_parent'
    ],

    'our_products' => [
        'id' => 'our_products',
        'url_key' => 'products',
        'title' => 'Our Products',
        'url' => 'admin.php?page=products&action=show_all',
        'target' => '_parent'
    ]
];

?>

<body>
<div id="header"><br>
    <div style="text-align: left; padding-left:20px"><b>TEKHQS MANGEMENT SYETEM </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    </div>
</div>

<div id="left_side">
    <br><br><br>

    <table>

        <?php
        $selectedMenuItem = '';
        $adduser = '';
        foreach ($menuItems as $menuItem) {
            if (isset($_GET['page']) && $_GET['page'] == $menuItem['url_key']) {
                $selectedMenuItem = '&#10132;';
            } else {

                $selectedMenuItem = '';
            }
//

            ?>
            <tr>
                <td>

                    <a target="<?php echo $menuItem['target']; ?>" href="<?php echo $menuItem['url']; ?>">
                        <button style="text-align: left"
                                id="<?php echo $menuItem['id']; ?>">  <?php echo $selectedMenuItem . ' ' . $menuItem['title']; ?></button>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>

    </table>

</div>
<div id="right_side">
    <?php

    switch ($page) {

        case 'users';
            if ($action == 'view') {
                include_once('view_user.php');
            } elseif ($action == 'edit') {
                include_once('edit_user.php');
            } elseif ($action == 'delete') {
                include_once('edit_user.php');
            } elseif ($action == 'add_user') {
                include_once('add_new_user.php');
            } elseif ($action == 'show_all') {
                include_once('users_list.php');
            } elseif ($action == 'edit_user') {
                include_once('edit_user.php');
            }
            break;

        case 'customers';
            if ($action == 'add_customers') {
                include_once('add_customers.php');
            } elseif ($action == 'show_customers') {
                include_once('show_customers.php');
            }elseif($action=='view'){
                include_once ('view_customer.php');
            }elseif ($action=='edit') {
                include_once('edit_customers.php');
            }elseif ($action=='delete'){
                include_once ('delete_user.php');
            }
            break;


             case 'dashboard':
            if($action='dashboard'){
                include('dashboard.php');
            }
            break;



    }



    ?>

</div>
</body>
</html>