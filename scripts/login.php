<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname  = "HotelDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//mysql_connect("localhost","root","");
//mysql_select_db("HotelDB");
//$result = mysql_query("select * from users where username= '$username' and password='$password'")
//          or die("Failed to query database".mysql_error());
//$row= mysql_fetch_array($result);
//if ($row['username']==$username && $row['password']== $password){
//   echo "Login Successful. Welcome".$row['username'];
// }
// else{
//   echo "Failed to login"
// }

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
         // to prevent mysql injection
         $username=stripcslashes($username);
         $password=stripcslashes($password);
         $username= mysql_real_escape_string($username);
         $password= mysql_real_escape_string($password);

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
