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
$playlist_name = $_GET['playlist_name'];
$video_id = $_GET['video_id'];

$sql = "select max(seq_no) as max_no from contains where email_id='$email_id' and playlist_name='$playlist_name'";
$result = $conn->query($sql);
$seqno = 0;
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $seqno = $row['max_no'];
    }
}
//echo $seqno;
$seqno = $seqno + 1;

$sql = "INSERT INTO contains VALUES ('$email_id', '$playlist_name', $video_id, $seqno)";

if ($conn->query($sql) === TRUE) {
    echo "yes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?> 
