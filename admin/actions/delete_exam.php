<?php
include'database.php';
if(isset($_GET['eid']))
{
	$eid=$_GET['eid'];
	$deleteExam=$connect->query("DELETE FROM exams WHERE exam_id=$eid");
	header('location:../addExam.php');
}
else
{
	echo "Page not Fount";
}
?>