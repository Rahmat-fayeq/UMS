<?php
include'database.php';
if(isset($_GET['aid']))
{
	$aid=$_GET['aid'];
	$removeQuestion=$connect->query("DELETE FROM articles WHERE Article_id=$aid");
	header('location:../articles.php');
}
else
{
	echo "Page not Fount";
}


?>