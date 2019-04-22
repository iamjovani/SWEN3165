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
        $username  = $_POST['username'];
        $password  = $_POST['password'];

        $result = mysqli_query($conn,"SELECT * FROM CustomerAccount WHERE username='" . $_POST["username"] .
                     "' and password = '". $_POST["password"]."'");
        
        if(mysqli_num_rows($result) > 0)
        {
            echo 'Login Successful!';
        }else
        {
            echo 'Login Failed';
        }
    }
}


?>