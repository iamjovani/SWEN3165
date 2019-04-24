<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname   = "HotelDB";

// Create connection
$conn = new mysqli($servername, $username, $password);
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

        #while ($conn->more_results()) {$conn->next_result();}

        $id = md5(microtime().rand());
        $lastname    = $_POST['lastname']; //check
        $firstname   = $_POST['firstname']; //check
        $email       = $_POST['email']; //check
        $dateofbirth = strtotime($_POST['dateofbirth']); //check
        $dateofbirth = date('Y-m-d', $dateofbirth);
        $username    =$_POST['username'];
        $telephone   = $_POST['telephone']; //check
        $gender      = $_POST['gender']; //check
        $pass    = $_POST['password']; //check

        #INSERT INTO CustomerAccount VALUES (123, "BOB", "Brown","123@db.com","Male", "2017-04-24","Bobb", "12345", "67545336");
        $sqll = "INSERT INTO CustomerAccount VALUES ($id, $firstname, $lastname, $email, $gender, $dateofbirth, $username, $pass, $telephone)";

        if ($conn->query($sqll)) {
            echo "New record created successfully";
         } else {
            echo "Error: " . $sqll . "" . mysqli_error($conn);
         }
         $conn->close();
    }
}

?>
