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
$sql = file_get_contents("Hoteldb.sql");

if ($conn->multi_query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['finish']))
    {
    
        $lastname  = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $email     = $_POST['email'];
        $streetna  = $_POST['streetname'];
        $country   = $_POST['country'];
        $streetnu  = $_POST['streetname'];
    }
}

?>
