<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname  = "HotelDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['finish']))
    {
        $id = '';
        $fullname  = explode(" ", $_POST['fullname']);
        $firstname = $fullname[0];
        $lastname  = $fullname[1];
        $admin     = "admin";


        $suiteSelected = $_POST['suitetype'];
        $suiteprice    = 0;
        if($suiteSelected == "Penthouse")
        {
        $suiteprice = 15000;
        }else if($suiteSelected == "Double Room")
        {
            $suiteprice = 12000;
        }else if($suiteprice == "Family Suite")
        {
            $suiteprice = 13000;
        }else if($suiteSelected = "Single Room")
        {
            $suiteprice = 8000;
        }


        $getid  = "SELECT accountid WHERE firstname='$firstname' and lastname='$lastname'";
        $result = mysqli_query($conn, $getid); 

        if (mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
               $id = $row["accountid"];
            }
         } else {
            echo "0 results";
         }

        $booking = "INSERT INTO Reservation VALUES ('$id','$firstname', '$lastname', '".$_POST['email']."', '".$_POST['startdate']."', '".$_POST['enddate']."', '".$_POST['suitetype']."', '".$_POST['numadlts']."', '".$_POST['numchldrn']."', '".$_POST['AccountNumber']."', '".$_POST['CVC']."', '".$_POST['Expirationdate']."')";

        if ($conn->query($booking)) 
        {
            echo "<script>
            alert('Booking Successful!');
            window.location.href='../login.html';
            </script>";
        }
        else
        {
            echo "Error: " . $booking . "" . mysqli_error($conn);
        }
        $conn->close();
    }
}


?>
