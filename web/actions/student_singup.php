<?php
include 'database.php';
if(isset($_POST['fname']))
{
	
	 $image_name=$_FILES['image']['name'];
     $tmp=$_FILES['image']['tmp_name'];
     $serverpath="images/".$image_name;

	 $month=$_POST['month'];
	 $day=$_POST['day'];
	 $year=$_POST['year'];
	 $dob=$day."/".$month."/".$year;
	 $fname=$_POST['fname'];
	 $lname=$_POST['lname'];
	 $username=$_POST['username'];
	 $pass=$_POST['pass'];
	 $pass=password_hash($pass,PASSWORD_BCRYPT);
	 $add=$_POST['address'];
	 $gender=$_POST['gender'];
	 $phone=$_POST['phone'];
	 $depart_id=$_POST['depart_id'];
	 $insert="
	 INSERT INTO students(First_name,Last_name,User_name,Password
	 ,image,Address,Gender,Phone,DOB,Department_id)
	 VALUES ('$fname','$lname','$username','$pass','$image_name','$add','$gender','$phone','$dob','$depart_id')";
	 $query=$connect->query($insert);

	 if($query)
	 {	 move_uploaded_file($tmp,$serverpath);
	 	 echo "successed";
	 }
	 else
	 {
	 	echo "not";
	 }
	 
	
}
?>