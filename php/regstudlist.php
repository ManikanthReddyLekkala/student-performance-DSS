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

$sql = "select STUDENTS.student_name, STUDENTS.student_id from COURSES, STUDENTS, REGESTERED_COURSES where COURSES.course_crn = REGESTERED_COURSES.course_crn_FK and STUDENTS.student_id = REGESTERED_COURSES.student_id_FK and COURSES.course_crn =" . $_GET['crn'];

$result = mysqli_query($conn, $sql);

$arr = array();
$usr = array();


if (mysqli_num_rows($result) > 0) {
	
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	$id = $row["student_id"];
}
} else {
    echo "0 results";
}

mysqli_close($conn);

$conn = mysqli_connect($servername, $username, $password, $dbname);


$sql = "select STUDENTS.student_name, STUDENTS.student_id
from COURSES, STUDENTS, REGESTERED_COURSES
where COURSES.course_crn = REGESTERED_COURSES.course_crn_FK
and STUDENTS.student_id = REGESTERED_COURSES.student_id_FK
and COURSES.course_crn =" . $_GET['crn'];
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
	
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	$arr['rows'] = mysqli_num_rows($result);
	$arr["student_name"] = $row["student_name"];
	$arr["student_id"] = $row["student_id"];
	array_push($usr, array("Courses" => $arr));
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