<?php
include'database.php';
if(isset($_GET['iid']))
{
	$iid=$_GET['iid'];
	$deleteImage=$connect->query("DELETE FROM gallery WHERE id=$iid");
	header('location:../uploadImages.php');
}
else
{
	echo "Page not Fount";
}


?>