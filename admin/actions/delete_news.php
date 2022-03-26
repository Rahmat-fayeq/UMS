<?php
include'database.php';
if(isset($_GET['nid']))
{
	$nid=$_GET['nid'];
	$deleteNews=$connect->query("DELETE FROM news WHERE id=$nid");
	header('location:../viewAllNews.php');
}
else
{
	echo "Page not Fount";
}
?>