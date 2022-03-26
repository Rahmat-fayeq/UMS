<?php
	include('conn.php');

	if(isset($_REQUEST['forgotpassword']))
	{
		$email=$_REQUEST['email'];
	

			$data="select * from admin_login where email='$email'";
			$query=$conn->query($data);
			if($query->num_rows > 0)
			{
				$str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
				$str = str_shuffle($str);
				$str = substr($str, 0, 10);
				$url = "localhost/FMS/admin_side/resetPassword.php?token='$str'&email='$email'";
				/*mail($email, "Reset password", "To reset your password, please visit this: $url", "From: myanotheremail@domain.com\r\n"); */
				$up="UPDATE admin_login SET token='$str' WHERE email='$email'";
				//echo $up;
				//exit(0);
				$qu=$conn->query($up);
				echo "link has been sent to your email<br>";
				echo $url;
			}
			else
			{
				echo "Something went wrong please try again";
			}
		}
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>forgotPassword</title>
<link href="asset_admin/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">	
</head>
<body>

<div class="container">	
   <div class="col-xs-4" style="margin-left: 300px; margin-top: 70px; border-radius: 8px;font-size: 15px;">
	<div class="form-group">
		<form class="form" action="" method="post">
			<div class="form-group">
			<label style="margin-top: 20px;">Email:</label>
			<input class="form-control" type="text" required="required" name="email" placeholder="Enter email...">
			</div>

			<div>
				<input class="btn btn-default" type="submit" name="forgotpassword" value="Send"/>
			</div>
		</form>
	</div>
	</div>
</div>	
</body>
</html>