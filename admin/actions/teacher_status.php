<?php
include'database.php';
if(isset($_GET['tid']))
{
	$tid=$_GET['tid'];
	$check=$connect->query("SELECT status FROM teachers WHERE Teacher_id=$tid");
	$r=$check->fetch_object();
	if($r->status=='unblock')
	{
	$BlockTeacher=$connect->query("UPDATE teachers SET status='block'WHERE Teacher_id=$tid");
	header('location:../teachers.php');
    }
    else
    {
      $BlockTeacher=$connect->query("UPDATE teachers SET status='unblock'WHERE Teacher_id=$tid");
	  header('location:../teachers.php');
    }
}
else
{
	echo "Something is wrong ! plaese Try againg";
}
?>