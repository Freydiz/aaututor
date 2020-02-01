<?php

// Database credentials:
$hostname = "localhost";
$username = "joanadk_joanadk";
$password = "o20873zCcg";
$databaseName = "joanadk_AAUTutor";

//Creating a PDO object for connection:

try {
$PDO = new PDO('mysql:host=localhost;dbname=joanadk_AAUTutor', 'root', ''); 
  // Set the PDO error mode to exception
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}  


?>