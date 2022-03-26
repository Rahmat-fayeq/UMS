<?php
include'database.php';
if(isset($_GET['sid']))
{
	$sid=$_GET['sid'];
	$check=$connect->query("SELECT status FROM students WHERE Student_id=$sid");
	$r=$check->fetch_object();
	if($r->status=='unblock')
	{
	$removeStudent=$connect->query("UPDATE students SET status='block'WHERE Student_id=$sid");
	header('location:../students.php');
    }
    else
    {
      $removeStudent=$connect->query("UPDATE students SET status='unblock'WHERE Student_id=$sid");
	  header('location:../students.php');
    }
}
else
{
	echo "Something is wrong ! plaese Try againg";
}
?>