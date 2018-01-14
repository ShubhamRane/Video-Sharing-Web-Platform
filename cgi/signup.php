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
$email = $_GET['email'];
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$password = $_GET['password'];
$dob = $_GET['dob'];
$sql = "INSERT INTO v_user VALUES ('$email', '$firstname', '$lastname', '2012-01-01', false, '$password')";

if ($conn->query($sql) === TRUE) {
    echo "yes";
} else {
    echo "no";
}
$conn->close();
?> 
