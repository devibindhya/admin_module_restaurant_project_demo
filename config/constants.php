<?php
/*Session Start */
session_start();
/*Define loclhost as a constant value */
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food-order');
//constant for site_url
define('SITEURL','http://localhost/fooddeliveryproject/');

$conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
$db_select=mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
    
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }


/*$conn=mysqli_connect('localhost','root','') or die(mysqli_error());
    $db_select=mysqli_select_db($conn,'food-order') or die(mysqli_error());
    
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }*/
?>