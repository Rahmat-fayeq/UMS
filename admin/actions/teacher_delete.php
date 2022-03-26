<?php
include'database.php';
if(isset($_GET['tid']))
{
	$tid=$_GET['tid'];
	$removeTeacher=$connect->query("DELETE FROM teachers WHERE Teacher_id=$tid");
	header('location:../teachers.php');
}
else
{
	echo "Something is wrong ! plaese Try againg";
}


?>