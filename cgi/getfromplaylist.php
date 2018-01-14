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
$playlist_name = $_GET['playlist_name'];
$email_id = $_GET['email_id'];

$sql = "SELECT * from contains where email_id='$email_id' and playlist_name='$playlist_name'";
$result = $conn->query($sql);
$rows = array();
// output data of each row
while($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
echo json_encode($rows);
$conn->close();
?> 
