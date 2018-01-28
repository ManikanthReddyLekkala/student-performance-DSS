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

$sql = "SELECT SUM(Total) AS Per FROM

(    
    select ((sum(SCORES.score)*((WEIGHTAGES.weightage)/100))/SUM(SUB_TASKS.points)) AS Total from SCORES, SUB_TASKS, WEIGHTAGES 
    where SUB_TASKS.sub_task_id = SCORES.sub_task_id_FK
          and WEIGHTAGES.weightage_id = SUB_TASKS.weightage_id_FK
          and SCORES.student_id_FK=". $_GET['id'] .
          " and WEIGHTAGES.course_crn_FK =" . $_GET['crn'] .
		  " and WEIGHTAGES.task_id_FK=1
          group by WEIGHTAGES.task_id_FK
          
    UNION ALL
	select ((sum(SCORES.score)*((WEIGHTAGES.weightage)/100))/SUM(SUB_TASKS.points)) AS Total from SCORES, SUB_TASKS, WEIGHTAGES 
    where SUB_TASKS.sub_task_id = SCORES.sub_task_id_FK
          and WEIGHTAGES.weightage_id = SUB_TASKS.weightage_id_FK
          and SCORES.student_id_FK=". $_GET['id'] .
          " and WEIGHTAGES.course_crn_FK =" . $_GET['crn'] .
		  " and WEIGHTAGES.task_id_FK=2
          group by WEIGHTAGES.task_id_FK
    UNION ALL
	select ((sum(SCORES.score)*((WEIGHTAGES.weightage)/100))/SUM(SUB_TASKS.points)) AS Total from SCORES, SUB_TASKS, WEIGHTAGES 
    where SUB_TASKS.sub_task_id = SCORES.sub_task_id_FK
          and WEIGHTAGES.weightage_id = SUB_TASKS.weightage_id_FK
          and SCORES.student_id_FK=". $_GET['id'] .
          " and WEIGHTAGES.course_crn_FK =" . $_GET['crn'] .
		  " and WEIGHTAGES.task_id_FK=3
          group by WEIGHTAGES.task_id_FK
    UNION ALL
	select ((sum(SCORES.score)*((WEIGHTAGES.weightage)/100))/SUM(SUB_TASKS.points)) AS Total from SCORES, SUB_TASKS, WEIGHTAGES 
    where SUB_TASKS.sub_task_id = SCORES.sub_task_id_FK
          and WEIGHTAGES.weightage_id = SUB_TASKS.weightage_id_FK
          and SCORES.student_id_FK=". $_GET['id'] .
          " and WEIGHTAGES.course_crn_FK =" . $_GET['crn'] .
		  " and WEIGHTAGES.task_id_FK=4
          group by WEIGHTAGES.task_id_FK
    UNION ALL
	select ((sum(SCORES.score)*((WEIGHTAGES.weightage)/100))/SUM(SUB_TASKS.points)) AS Total from SCORES, SUB_TASKS, WEIGHTAGES 
    where SUB_TASKS.sub_task_id = SCORES.sub_task_id_FK
          and WEIGHTAGES.weightage_id = SUB_TASKS.weightage_id_FK
          and SCORES.student_id_FK=". $_GET['id'] .
          " and WEIGHTAGES.course_crn_FK =" . $_GET['crn'] .
		  " and WEIGHTAGES.task_id_FK=5
          group by WEIGHTAGES.task_id_FK
    UNION ALL
	select ((sum(SCORES.score)*((WEIGHTAGES.weightage)/100))/SUM(SUB_TASKS.points)) AS Total from SCORES, SUB_TASKS, WEIGHTAGES 
    where SUB_TASKS.sub_task_id = SCORES.sub_task_id_FK
          and WEIGHTAGES.weightage_id = SUB_TASKS.weightage_id_FK
          and SCORES.student_id_FK=". $_GET['id'] .
          " and WEIGHTAGES.course_crn_FK =" . $_GET['crn'] .
		  " and WEIGHTAGES.task_id_FK=6
          group by WEIGHTAGES.task_id_FK
		  UNION ALL
	select ((sum(SCORES.score)*((WEIGHTAGES.weightage)/100))/SUM(SUB_TASKS.points)) AS Total from SCORES, SUB_TASKS, WEIGHTAGES 
    where SUB_TASKS.sub_task_id = SCORES.sub_task_id_FK
          and WEIGHTAGES.weightage_id = SUB_TASKS.weightage_id_FK
          and SCORES.student_id_FK=". $_GET['id'] .
          " and WEIGHTAGES.course_crn_FK =" . $_GET['crn'] .
		  " and WEIGHTAGES.task_id_FK=7
          group by WEIGHTAGES.task_id_FK
        
) apple";

$result = mysqli_query($conn, $sql);

$arr = array();
$usr = array();


if (mysqli_num_rows($result) > 0) {
	
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	$arr['rows'] = mysqli_num_rows($result);
	$arr["Percent"] = $row["Per"];
	array_push($usr, array("Percent" => $arr));
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