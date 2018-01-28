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

$sql = "select COURSES.course_crn, COURSES.course_name, TASKS.task_id,TASKS.task_name, WEIGHTAGES.weightage FROM WEIGHTAGES LEFT OUTER JOIN COURSES ON (COURSES.course_crn = WEIGHTAGES.course_crn_FK) LEFT OUTER JOIN TASKS ON (WEIGHTAGES.task_id_FK = TASKS.task_id) where COURSES.course_crn =" . $_GET['id'];
$result = mysqli_query($conn, $sql);

$arr = array();
$usr = array();

if (mysqli_num_rows($result) > 0) {
	
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	$arr['rows'] = mysqli_num_rows($result);
	$arr["course_id"] = $row["course_crn"];
	$arr["course_name"] = $row["course_name"];
	$arr["task_id"] = $row["task_id"];
	$arr["task_name"] = $row["task_name"];
	$arr["weightage"] = $row["weightage"];

	array_push($usr, array("Weightages" => $arr));
}
} else {
    echo "0";
}

echo json_encode($usr);
mysqli_close($conn);
?>