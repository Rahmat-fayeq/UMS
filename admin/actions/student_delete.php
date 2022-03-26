<?php
include'database.php';
if(isset($_GET['sid']))
{
	$sid=$_GET['sid'];
	$removeStudent=$connect->query("DELETE FROM students WHERE Student_id=$sid");
	header('location:../students.php');
}
else
{
	echo "Something is wrong ! plaese Try againg";
}


?>