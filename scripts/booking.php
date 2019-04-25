<html>

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


        $getid  = "SELECT accountid WHERE firstname='$firstname' and lastname='$lastname'";
<<<<<<< HEAD
        $result = mysqli_query($conn, $getid); 
=======
        $result = mysql_query($conn, $getid);
>>>>>>> b9d56161483d97097eaf54a775aebcd699db92be

        if (mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
               $id = $row["accountid"];
            }
         } else {
            echo "0 results";
         }

<<<<<<< HEAD
        $booking = "INSERT INTO Reservation
        VALUES ('$id','$firstname', '$lastname', '".$_POST['email']."', '".$_POST['startdate']."', '".$_POST['enddate']."', '".$_POST['roomt']."', '".$_POST['numadlts']."', '".$_POST['numchldrn']."', '".$_POST['cardnum']."', '".$_POST['CVC']."', '".$_POST['expdate']."')";

        if ($conn->query($booking)) 
=======
        $booking = "INSERT INTO Reservation VALUES ()
        VALUES ('$id','$firstname', '$lastname', '".$_POST['email']."', '".$_POST['startdate']."', '".$_POST['enddate']."', '".$_POST['suitetype']."', '".$_POST['numadlts']."', '".$_POST['numchldrn']."', '".$_POST['AccountNumber']."', '".$_POST['CVC']."', '".$_POST['Expirationdate']."')";

        if ($conn->query($sqll))
>>>>>>> b9d56161483d97097eaf54a775aebcd699db92be
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
</html>
