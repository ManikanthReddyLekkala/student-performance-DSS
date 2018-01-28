<?php
$servername = "localhost";
$username = "mchavali";
$password = "mchavali";
$dbname = "lms_mchavali";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "Insert into WEIGHTAGES (task_id_FK, course_crn_FK, weightage) values ('" . $_GET['task'] . "', '" . $_GET['id'] . "', '" . $_GET['weightage'] . "')";

if ($conn->query($sql) === TRUE) {
    echo "Record updates successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

mysqli_close($conn);
?>