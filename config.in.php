<?php
global $DB;

include_once(__DIR__ . '/classes/DB.class.php');
include_once (__DIR__ . '/classes/Users.php');
include_once (__DIR__.'/classes/customers.php');
include_once ('classes/pagination.php');
session_start();
/**
 *
 * Configuration file for project
 *
 */

$databaseHost = 'localhost';
$databaseUser = 'root';
$databasePass = '';
$databaseName = 'tekhqs';


//$DB = new DB($databaseHost, $databaseUser, $databasePass, $databaseName);
//$DB->insert('user',['name'=>'sohail','password'=>'ufone']);
//$DB-> update('user',['name'=>'afeen','password'=>'tekhq' ],'id=2');
//$DB->delete('user','id=1');
//$DB->select('user');
//$DB->getResult();

//$data=new pagination;
//$data->_createConnection('localhost','root','','tekhqs');
//$data->GetDataBaseCount( 'users');

//echo $user->totalRecord;
//echo $user->limit;
//echo $user->pages;







?>