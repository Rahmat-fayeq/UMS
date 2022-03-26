<?php
include'database.php';
if(isset($_GET['fid']))
{
	$fid=$_GET['fid'];
	$deleteFeedback=$connect->query("DELETE FROM feedback_tb WHERE feedback_id=$fid");
	header('location:../feedback.php');
}
else
{
	echo "Page not Fount";
}


?>