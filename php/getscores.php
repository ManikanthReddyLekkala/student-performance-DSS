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

$sql = "select STUDENTS.student_name, STUDENTS.student_id,COURSES.course_name, COURSES.course_crn, SUB_TASKS.sub_task_name, SCORES.score,SUB_TASKS.points
from STUDENTS, COURSES, TASKS, SUB_TASKS, SCORES, WEIGHTAGES
where
WEIGHTAGES.course_crn_fk = COURSES.course_crn
and WEIGHTAGES.weightage_id = SUB_TASKS.weightage_id_fk
and TASKS.task_id = WEIGHTAGES.task_id_fk
and SCORES.student_id_FK = STUDENTS.student_id
and SCORES.sub_task_id_FK = SUB_TASKS.sub_task_id
and STUDENTS.student_id = " . $_GET['id'] .
" and COURSES.course_crn = " . $_GET['crn'] .
" and TASKS.task_name = '" . $_GET['cat']. "'";
$result = mysqli_query($conn, $sql);

$arr = array();
$usr = array();


if (mysqli_num_rows($result) > 0) {
	
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	$arr['rows'] = mysqli_num_rows($result);
	$arr["sub_task_name"] = $row["sub_task_name"];
	$arr["score"] = $row["score"];
	$arr["points"] = $row["points"];
	array_push($usr, array("Tasks" => $arr));
}
} else {
    echo "0 results";
}

echo json_encode($usr);
mysqli_close($conn);
?>