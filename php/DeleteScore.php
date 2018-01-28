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

$sql = "Delete From SCORES WHERE sub_task_id_FK =" . $_GET['subid'] . " and student_id_FK =" . $_GET['studid'];
//echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Successful";
} else {
    echo "Error";
}

$conn->close();
?>