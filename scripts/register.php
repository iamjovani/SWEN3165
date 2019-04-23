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

        $sql = "INSERT INTO CustomerAccount VALUES (12, $firstname, $lastname, $email, $gender, $dateofbirth, $pass, $telephone)";

        try
        {
        
            $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // use exec() because no results are returned
            $connect->exec($sql);
                echo "Account created successfully";
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        $connect = null;
    }
}

?>
