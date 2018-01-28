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
  $users_name = $_GET['name'];
  $users_email = $_GET['email'];
  $users_id = $_GET['id'];
  $users_phone = $_GET['phone'];
 

$sql = "INSERT INTO STUDENTS (student_id, student_name, student_email, student_phone) VALUES ('" . $_GET['id'] . "', '" . $users_name . "', '" . $_GET['email'] . "', '" . $_GET['phone'] . "')";
//echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Successful";
} else {
    echo "Error";
}

$conn->close();
?>