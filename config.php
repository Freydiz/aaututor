<?php

// Database credentials:
$hostname = "mysql90.unoeuro.com";
$username = "henrietteriis_dk";
$password = "39mtgxdk";
$databaseName = "henrietteriis_dk_db2";

//Creating a PDO object for connection:

try {
$PDO = new PDO('mysql:host=mysql90.unoeuro.com;dbname=henrietteriis_dk_db2', 'henrietteriis_dk', '39mtgxdk'); 
  // Set the PDO error mode to exception
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}  


?>