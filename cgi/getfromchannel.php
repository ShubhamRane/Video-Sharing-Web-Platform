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
$channel_id = $_GET['channel_id'];

$sql = "SELECT * from includes where channel_id='$channel_id'";
$result = $conn->query($sql);
$rows = array();

// output data of each row
while($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode($rows);
$conn->close();
?> 
