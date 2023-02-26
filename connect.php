<?php
//Set variables for the Server Name / Address, Database Name and Username & Password details.
$my_host = "localhost";
$my_db = 'bikeking';  //change to match your DB
$my_db_username = "root";
$my_db_passwd = "";


    //PHP Data Objects
	$DB = new PDO("mysql:host=$my_host;dbname=$my_db", $my_db_username, $my_db_passwd);
	
?>