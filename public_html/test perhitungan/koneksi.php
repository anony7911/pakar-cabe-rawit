<?php
//-- database configurations
$dbhost='localhost';
$dbuser='u939198444_ernia';
$dbpass='Kolaka123';
$dbname='u939198444_ernia';
//-- database connections
$db=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
//-- halt and show error message if connection fail
if ($db->connect_error) {
	die('Connect Error ('.$db->connect_errno.')'.$db->connect_error);
}
?>