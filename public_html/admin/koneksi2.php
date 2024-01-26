<?php
$dbhost='localhost';
$dbuser='u939198444_ernia';
$dbpass='Kolaka123';
$dbname='u939198444_ernia';
$db=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if ($db->connect_error) {
	die('Connect Error ('.$db->connect_errno.')'.$db->connect_error);
}
?>