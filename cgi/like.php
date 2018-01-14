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
echo "Connected successfully";
$video_id = $_GET['video_id'];
$email_id = $_GET['email_id'];
$polarity = $_GET['polarity'];

$sql = "INSERT INTO liked_by VALUES ($video_id, '$email_id', $polarity)";

if ($conn->query($sql) === TRUE) {
    echo "yes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?> 
