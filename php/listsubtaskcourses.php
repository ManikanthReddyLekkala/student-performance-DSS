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

$sql = "SELECT SUB_TASKS.sub_task_name, SUB_TASKS.sub_task_id, SUB_TASKS.points
from WEIGHTAGES, SUB_TASKS
where SUB_TASKS.weightage_id_FK = WEIGHTAGES.weightage_id
and WEIGHTAGES.course_crn_FK =" . $_GET['crn'];

$result = mysqli_query($conn, $sql);

$arr = array();
$usr = array();


if (mysqli_num_rows($result) > 0) {
	
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	$arr['rows'] = mysqli_num_rows($result);
	$arr["sub_task_name"] = $row["sub_task_name"];
	$arr["sub_task_id"] = $row["sub_task_id"];
	$arr["points"] = $row["points"];
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