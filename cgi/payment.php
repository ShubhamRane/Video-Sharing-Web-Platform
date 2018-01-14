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
$payment_id = $_GET['payment_id'];
$payee_id = $_GET['payee_id'];
$payment_method = $_GET['payment_method'];
$amount = $_GET['amount'];

$sql = "INSERT INTO payment VALUES ('$payment_id', '$payee_id','$payment_method', $amount, NOW(), DATE_ADD(NOW(), INTERVAL 1 YEAR))";

if ($conn->query($sql) === TRUE) {
    echo "yes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?> 
