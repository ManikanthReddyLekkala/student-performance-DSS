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

$sql = "select WEIGHTAGES.weightage_id from WEIGHTAGES , TASKS where WEIGHTAGES.task_id_fk = TASKS.task_id and WEIGHTAGES.course_crn_fk = '" . $_GET['id'] . "' and TASKS.task_name = '" . $_GET['task'] . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
	$wid = $row["weightage_id"];
}
} else {
    echo "0 results";
}

mysqli_close($conn);

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO SUB_TASKS (sub_task_name, weightage_id_FK, points) VALUES ('" . $_GET['subtask'] . "', '" . $wid . "', '" . $_GET['points'] . "')";

if ($conn->query($sql) === TRUE) {
    echo "Successful";
} else {
    echo "Error";
}

$conn->close();


?>