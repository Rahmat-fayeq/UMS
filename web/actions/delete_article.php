<?php
require 'database.php';
session_start();
$id=$_SESSION['faculty_id'];
if(isset($_GET['aid']))
{
	$aid=$_GET['aid'];
	$delete=$connect->query("DELETE FROM articles WHERE Article_id=$aid");
	if($delete)
	{
		header("location:../profiles_f.php?id=$id");
	}
	else
	{
		echo "try again!";
	}
}
?>