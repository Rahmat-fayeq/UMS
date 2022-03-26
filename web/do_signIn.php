<?php
include 'actions/database.php';

if(isset($_POST['email']))
{
		$email=$_POST['email'];
		$password=$_POST['password'];
		$role=$_POST['role'];
	

		if($role=="student")
		{
		    if(isset($_POST['remember_me']))
		     {
		     	setcookie("student_user_name",$email,time()+(3600)*30);
		     	setcookie("student_password",$password,time()+(3600)*30);
		     }
		  $check_user="SELECT * FROM students WHERE User_name='$email' AND status='unblock'";
		  $query=$connect->query($check_user);
		  if($query->num_rows>0)
		  {
		  		$row=$query->fetch_object();
		
		  		
		  			if(password_verify($password,$row->Password))
			  		{
			  			$_SESSION['student_id']=$row->Student_id;
	                    $_SESSION['student_user_name']=$row->User_name;
	                    echo "success";  
			  		}
			  		else
			  		{
			  			echo "Invalid_Password";
			  		}
		  		
		  		
		  }
		  else
		  {
		  	echo "Invalid_Email";
		  }


		}

		if($role=="teacher")
		{
			 if(isset($_POST['remember_me']))
		     {
		  setcookie("teacher_user_name",$email,time()+(3600)*30);
		  setcookie("teacher_password",$password,time()+(3600)*30);
		     }
		  $check_user="SELECT * FROM teachers WHERE User_name='$email' AND status='unblock'";
		  $query=$connect->query($check_user);
		  if($query->num_rows>0)
		  {
		  		$row=$query->fetch_object();
		  		if(password_verify($password,$row->Password))
		  		{
		  			$_SESSION['faculty_id']=$row->Teacher_id;
                    $_SESSION['faculty_user_name']=$row->User_name;
                     echo "success";   
		  		}
		  		else
		  		{
		  			echo "Invalid_Password";
		  		}

		  }
		  else
		  {
		  	echo "Invalid_Email";
		  }
		}
}
else
{
	header('location:login.php');
}
?>