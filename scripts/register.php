<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE HotelDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}


if(isset($_POST['finish']))
{
    
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $email     = $_POST['email'];
    $account   = $_POST['accounttype'];
    $country   = $_POST['country'];
    $streetna  = $_POST['streetname'];
    $streetnu  = $_POST['streetname'];

    // Create database
    $sql = "CREATE DATABASE HotelDB";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
       echo "Error creating database: " . $conn->error;
    }
    echo($firstname + $lastname);
}
?>
