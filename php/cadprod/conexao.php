<?php

$user = 'root';
$pass = '';


try {
		$conn = new PDO("mysql:host=localhost;dbname=id7218638_logistica", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


?>
