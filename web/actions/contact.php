<?php
require 'database.php';
if(isset($_POST['fname']))
{
	$fname=mysqli_real_escape_string($connect,$_POST['fname']);
	$lname=mysqli_real_escape_string($connect,$_POST['lname']);
	$email=mysqli_real_escape_string($connect,$_POST['email']);
	$message=mysqli_real_escape_string($connect,$_POST['message']);
	$subject=mysqli_real_escape_string($connect,$_POST['subject']);
	$name=$fname.' '.$lname;
	$date=date("Y/m/d");
	$insert="
	INSERT INTO contact_us(contact_name,contact_email,subject,contact_massege,contact_date)
	VALUES('$name','$email','$subject','$message','$date')
	";
	$query=$connect->query($insert);
	if($query)
	{echo "done";}
	else{echo "not";}
}

?>