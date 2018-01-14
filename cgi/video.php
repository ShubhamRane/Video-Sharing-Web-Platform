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
// echo "Connected successfully";

$sql = "select max(video_id) as max_no from video";
$result = $conn->query($sql);
$video_id = 0;
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $video_id = $row['max_no'];
    }
}
//echo $seqno;
$video_id = $video_id + 1;

$email_id = $_GET['email_id'];
$title = $_GET['title'];
$url = $_GET['url'];
$duration = $_GET['duration'];
$isprime = $_GET['isprime'];
$restricted = $_GET['ageRestricted'];
$url = $_GET['url'];
$sql = "INSERT INTO video VALUES ($video_id, '$title', $duration, $isprime, $restricted, NOW(), '$url', '$email_id')";

if ($conn->query($sql) === TRUE) {
    echo "yes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 
