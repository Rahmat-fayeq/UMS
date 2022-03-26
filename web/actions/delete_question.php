<?php
require 'database.php';
session_start();
$id=$_SESSION['student_id'];
if(isset($_GET['qid']))
{
	$qid=$_GET['qid'];
	$delete=$connect->query("DELETE FROM questions WHERE Question_id=$qid");
	if($delete)
	{
		header("location:../profiles.php?id=$id");
	}
	else
	{
		echo "try again!";
	}
}
?>