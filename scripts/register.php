<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname   = "HotelDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

#possible trade off
/*
// Create database
$sql = file_get_contents("Hoteldb.sql");

if ($conn->multi_query($sql) === TRUE) {
    echo "Database created successfully ";
} else {
    echo "Error creating database: " . $conn->error;
}
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['finish']))
    {
        $id = md5(microtime().rand());

        $sqll = "INSERT INTO CustomerAccount 
        VALUES ('$id','".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['email']."', '".$_POST['gender']."', '".$_POST['dateofbirth']."', '".$_POST['username']."', '".$_POST['password']."', '".$_POST['telephone']."')";

        if ($conn->query($sqll)) {
            echo "New record created successfully";
            header('Location: ../login.html');
         } else {
            echo "Error: " . $sqll . "" . mysqli_error($conn);
         }
         $conn->close();
    }
}

?>
