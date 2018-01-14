 <?php

$servername = "localhost";
$username = "root";
$password = "Kenny#123";
$dbname = "vshare";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
$email_id = $_GET['email_id'];
$oldpass = $_GET['oldpass'];
$newpass = $_GET['newpass'];
$dob = $_GET['dob'];
$sql = "UPDATE v_user SET password='$newpass' where email='$email_id' and password='$oldpass'";

if ($conn->query($sql) === TRUE) {
    echo "yes";
} else {
    echo "no";
}
$conn->close();
?> 
