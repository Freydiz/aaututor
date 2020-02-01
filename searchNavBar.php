<?php
require 'config.php';

//try to make logout/login/welcomeMessage appear/disappear whether you're logged in or not

if (isset($_SESSION["userID"])) {
    
        echo "<script>
        window.onload = function() {
        document.getElementById('navUser').style.display = 'block';};
        </script>";
    
    $go = "home.php";
    
} else {
    echo "<script>
        window.onload = function() {
        document.getElementById('navVisit').style.display = 'block';};
        </script>";
    
    $go = "index.php";
}

?>