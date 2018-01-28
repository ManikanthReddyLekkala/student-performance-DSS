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

$sql = "SELECT student_id FROM STUDENTS where student_email = '" . $_GET['email'] . "'";
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


$sql = " select COURSES.course_name, COURSES.course_crn from COURSES, REGESTERED_COURSES where REGESTERED_COURSES.course_crn_FK = COURSES.course_crn and REGESTERED_COURSES.student_id_FK = '" . $id . "'";

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
	
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	$arr['rows'] = mysqli_num_rows($result);
	$arr["course_name"] = $row["course_name"];
	$arr["course_id"] = $row["course_crn"];
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