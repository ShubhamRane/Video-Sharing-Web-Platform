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

$sql = "select * from playlist where email_id='$email_id'";
$result = $conn->query($sql);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}

echo json_encode($rows);
$conn->close();

?> 
