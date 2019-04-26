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
        $custmail = $_POST['email'];
        $confirmpassword = $_POST['confirmpassword'];
        $admin     = "admin";
        $resid     = $id = md5(microtime().rand());


        $result = mysqli_query($conn, "SELECT accountid FROM CustomerAccount WHERE email='$custmail' AND password='$confirmpassword'"); 

        if (mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
               $id = $row["accountid"];
               $myfile = fopen("login.session", "w") or die("Unable to open file!");
               fwrite($myfile, $id);
            }
         } else {
            echo "0 results";
         }

        $booking = "INSERT INTO Reservation VALUES ('$resid+$id', '$id','".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['email']."', '".$_POST['startdate']."', '".$_POST['enddate']."', 'Penthouse', '".$_POST['numadlts']."', '".$_POST['numchldrn']."', '".$_POST['AccountNumber']."', '".$_POST['CVC']."', '".$_POST['expdate']."')";

        if ($conn->query($booking)) 
        {
            echo "<script>
            alert('Booking Successful!');
            window.location.href='../home2.html';
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
