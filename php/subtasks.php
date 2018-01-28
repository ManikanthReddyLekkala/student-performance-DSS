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

$sql = "select SUB_TASKS.sub_task_id, SUB_TASKS.sub_task_name, SUB_TASKS.points from WEIGHTAGES, SUB_TASKS where WEIGHTAGES.weightage_id = SUB_TASKS.weightage_id_fk and WEIGHTAGES.course_crn_FK=" . $_GET['id'];
$result = mysqli_query($conn, $sql);

$arr = array();
$usr = array();


if (mysqli_num_rows($result) > 0) {
	
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	$arr['rows'] = mysqli_num_rows($result);
	$arr["sub_task_id"] = $row["sub_task_id"];
	$arr["sub_task_name"] = $row["sub_task_name"];
	$arr["points"] = $row["points"];
	array_push($usr, array("Tasks" => $arr));
}
} else {
    echo "0 results";
}

echo json_encode($usr);
mysqli_close($conn);
?>