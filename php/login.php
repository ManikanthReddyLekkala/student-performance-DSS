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

$sql = "SELECT * FROM USERS where email = '" . $_GET['id'] . "'";
$result = mysqli_query($conn, $sql);
$arr = array();
$usr = array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	$arr["email"] = $row["email"];
	$arr["password"] = $row["password"];
	$arr["is_admin"] = $row["is_admin"];
	$arr["is_professor"] = $row["is_professor"];
	$arr["is_student"] = $row["is_student"];
	array_push($usr, array("Users" => $arr));
}
} else {
    echo "0 results";
}
//$yourJson = trim(json_encode($usr), '[]');
//echo $yourJson;
echo json_encode($usr);
mysqli_close($conn);
?>