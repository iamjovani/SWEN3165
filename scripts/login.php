<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname  = "HotelDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['finish']))
    {
        $username  = $_POST['username'];
        $password  = $_POST['password'];

        $result = mysqli_query($conn,"SELECT * FROM CustomerAccount WHERE username='" . $_POST["username"] .
                     "' and password = '". $_POST["password"]."'");
        
        if(mysqli_num_rows($result) > 0)
        {
            echo 'Login Successful!';
            header('Location: ../booking.html');
        }else
        {
            echo 'Login Failed';
        }
    }
}


?>