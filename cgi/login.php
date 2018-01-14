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
$password = $_GET['password'];

$sql = "select * from v_user where email_id='$email_id' and password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "yes";
} else {
    echo "no";
}

$conn->close();

?> 
