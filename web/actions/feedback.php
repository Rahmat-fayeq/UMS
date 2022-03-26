<?php
include 'database.php';
if(isset($_POST['name']))
{
	$name=mysqli_real_escape_string($connect,$_POST['name']);
	$email=mysqli_real_escape_string($connect,$_POST['email']);
	$msg=mysqli_real_escape_string($connect,$_POST['comments']);
	$rate=$_POST['rate'];
	$date=date('d/m/Y');
	$insert="
	INSERT INTO feedback_tb(Name,User_name,feedback_date,massege,rate)
	VALUES('$name','$email','$date','$msg','$rate')";
	$query=$connect->query($insert);
	if($query)
	{echo "done";}
	else{echo $insert;}
}


?>