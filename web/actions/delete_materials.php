<?php
require 'database.php';
$id=$_SESSION['faculty_id'];
if(isset($_GET['did']))
{
	$did=$_GET['did'];
	$delete=$connect->query("DELETE FROM materials WHERE Material_id=$did AND Teacher_id=$id");
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