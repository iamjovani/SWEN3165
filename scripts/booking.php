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


if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['finish']))
    {
        $fullname  = explode(" ", $_POST['fullname']); 
        $firstname = $fullname[0];
        $lastname  = $fullname[1];
        $email     = $_POST['email'];
        $gender    =$_POST['gender']; 
        $adults    = $_POST['numadlts'];
        $children  = $_POST['numchldrn'];
        $streetnu  = $_POST['streetname'];
        $phone     = $_POST['phone'];
        $startdate = $_POST['startdate'];
        $enddate   = $_POST['enddate'];
        $suitetype = $_POST['suitetype'];

     
    }
}


?>