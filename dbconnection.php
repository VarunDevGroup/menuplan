<?php

 $host = "127.0.0.1"; // Change this to your database server name
 $username = "root"; // Change this to your database username
 $password = "Qwe12#rty"; // Change this to your database password
 $database = "menuplandb"; // Change this to your database name


 function GetConnection()
 {

    

    $conn = new mysqli( "127.0.0.1", "root", "Qwe12#rty", "menuplandb");
    
    if(!$conn){
        echo "Database connection failed. Error:".$conn->error;
        exit;
        }

    return $conn;
 }

?>