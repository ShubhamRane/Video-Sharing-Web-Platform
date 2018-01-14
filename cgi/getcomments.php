 <?php
$servername = "localhost";
$username = "root";
$password = "Kenny#123";
$dbname = "vshare";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$video_id = $_GET['video_id'];

$sql = "SELECT * from comments where video_id=$video_id";
$result = $conn->query($sql);
$rows = array();
// output data of each row
while($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
echo json_encode($rows);
$conn->close();
?> 
