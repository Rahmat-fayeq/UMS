<?php
include'database.php';
if(isset($_GET['rid']))
{
	$id=$_GET['rid'];
	$deleteResult=$connect->query("DELETE FROM results WHERE result_id=$id");
	header('location:../ViewAllResult.php');
}
else
{
	echo "Page not Fount";
}
?>