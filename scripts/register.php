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
    echo "Database created successfully ";
} else {
    echo "Error creating database: " . $conn->error;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['finish']))
    {
    
        $lastname    = $_POST['lastname']; //check
        $firstname   = $_POST['firstname']; //check
        $email       = $_POST['email']; //check
        $dateofbirth = strtotime($_POST['dateofbirth']); //check
        $dateofbirth = date('Y-m-d', $dateofbirth);
        $telephone   = $_POST['telephone']; //check
        $gender      = $_POST['gender']; //check
        $pass    = $_POST['password']; //check

        $sqlqrr = "INSERT INTO CustomerAccount (firstname, lastname, email, gender, dateofbirth, pass, telephone) 
                   VALUES($firstname, $lastname, $email, $gender, $dateofbirth, $pass, $telephone)";


        //ISSUE: CUSTOMERACCOUNT NOT BEING CREATED DUE TO 'Commands out of sync; you can't run this command now'

        if ($conn->query($sqlqrr) === TRUE)
        {
            echo("Account Created Successfully!");
        }else
        { echo "Fail To Create Account!". $conn->error;}
    }


    $conn->close();
}

?>
