<?php
$servername = "localhost";
$username = "mchavali";
$password = "mchavali";
$dbname = "lms_mchavali";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "Update USERS SET password = '" . $_GET['password'] . "' Where email ='" . $_GET['email'] . "'";
//echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Successful";
} else {
    echo "Error";
}

$conn->close();
?>