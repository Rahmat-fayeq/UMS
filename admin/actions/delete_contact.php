<?php
include'database.php';
if(isset($_GET['cid']))
{
	$cid=$_GET['cid'];
	$deleteContact=$connect->query("DELETE FROM contact_us WHERE contact_id=$cid");
	header('location:../contact_us.php');
}
else
{
	echo "Page not Fount";
}
?>