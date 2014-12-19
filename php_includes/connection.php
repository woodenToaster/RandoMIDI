<?php
    //Connect to database
    $servername = "mysql.eecs.ku.edu";
    $username = "chogan";
    $password = '581!!';
    $db = "chogan";
    
    $conn = new mysqli($servername, $username, $password, $db);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>