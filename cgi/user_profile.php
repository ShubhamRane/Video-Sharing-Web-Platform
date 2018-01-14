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


$sql = "select count(*) as video_count from video where email_id='$email_id'";

$result = $conn->query($sql);
$video_count = 0;

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $video_count = $row['video_count'];
    }
}

$sql = "select count(*) as playlist_count from playlist where email_id='$email_id' group by playlist_name";
$result = $conn->query($sql);
$playlist_count = 0;

if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $playlist_count = $row['playlist_count'];
}

$sql = "select first_name as name from v_user where email_id='$email_id'";
$result = $conn->query($sql);
$firstname = "";

if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $firstname = $row['name'];
}

$myobj->video_count = $video_count;
$myobj->playlist_count = $playlist_count;
$myobj->user_name = $firstname;
echo json_encode($myobj);
$conn->close();
?> 
