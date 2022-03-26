<?php
include'database.php';
if(isset($_GET['sid']))
{
	$id=$_GET['sid'];
	$delete=$connect->query("DELETE FROM subjects WHERE subject_id=$id");
	header('location:../addSubjects.php');
}
else
{
	echo "Page not Fount";
}


?>