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

$sql = "SELECT TASKS.TASK_NAME, TASKS.task_id FROM TASKS, WEIGHTAGES, COURSES WHERE TASKS.TASK_ID = WEIGHTAGES.task_id_FK AND WEIGHTAGES.COURSE_CRN_FK = COURSES.COURSE_CRN AND COURSES.course_crn = " . $_GET['crn'];
$result = mysqli_query($conn, $sql);

$arr = array();
$usr = array();


if (mysqli_num_rows($result) > 0) {
	
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	$arr['rows'] = mysqli_num_rows($result);
	$arr["task_name"] = $row["TASK_NAME"];
	$arr["task_id"] = $row["task_id"];
	array_push($usr, array("Tasks" => $arr));
}
} else {
    echo "0 results";
}
//array_push($usr, array("rows" => mysqli_num_rows($result)));


//$yourJson = trim(json_encode($usr), '[]');
//echo $yourJson;
echo json_encode($usr);
mysqli_close($conn);
?>