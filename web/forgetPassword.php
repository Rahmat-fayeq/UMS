<?php 
error_reporting(0);
require 'assist/header.php';
require 'actions/database.php';
if(!isset($_SESSION['student_id']))
{
  if(isset($_SESSION['faculty_id']))
  {
      require 'assist/faculty_header.php';
  }
  else
  {
    require 'assist/main_header.php';
  }
}

if(isset($_SESSION['student_id']))
{
  require 'assist/student_header.php';
}
if(isset($_SESSION['faculty_id']))
{
   require 'assist/faculty_header.php';
}
// forget password
$msg="";
if(isset($_POST['forgetPass']))
{

  $email=$_POST['email'];
  $role=$_POST['role'];
  if($role=='student')
  {
    $select="SELECT * FROM students WHERE User_name='$email'";
    $query=$connect->query($select);
    if($query->num_rows>0)
    {
      $str="kjshfsfjk13442424kxvxvxhfksf42";
      $str=str_shuffle($str);
      $str=substr($str,0,10);
      $url="localhost/ums/web/actions/resetPassword.php?token='$str'&email='$email'&role=$role";

     //mail($ema, "Reset Password", "To Reset Your Password Please Visit This Like: $url","from: Ums@gmail.com\r\n");
      $update=$connect->query("UPDATE students SET token='$str' WHERE User_name='$email'");
      $msg="Please Check Your Emial!";
    }
    else
    {
    $msg="Please Enter Valid Email Or Select Your Role Properly!";
    }
  }
  if($role=='teacher')
  {
    $select="SELECT * FROM teachers WHERE User_name='$email'";
    $query=$connect->query($select);
    if($query->num_rows>0)
    {
      $str="kjshfsfjk13442424khfksf42";
      $str=str_shuffle($str);
      $str=substr($str,0,10);
      $url="localhost/ums/web/actions/resetPassword.php?token='$str'&email='$email'&role=$role";
     //mail($ema, "Reset Password", "To Reset Your Password Please Visit This Link: $url","from: Ums@gmail.com\r\n");
      $update=$connect->query("UPDATE teachers SET token='$str' WHERE User_name='$email'");
      $msg="Please Check Your Emial!";
    }
    else
    {
    $msg="Please Enter Valid Email Or Select Your Role Properly!";
    }
  }
 
}
?>
<div style="background-color: #ffffff; padding:20px 0 440px 0 ">
  <div class="container">
  	<div class="col-md-3 col-md-offset-4">
  			<form method="post" >
  				<label>Enter your Email:</label>
  				<input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
          <select class="form-control" name="role" required>
               <option disabled selected>-Select Your Role-</option>
               <option value="student">Student</option>
               <option value="teacher">Teacher</option>
          </select>
  				<input type="submit" name="forgetPass" value="Submit" class="btn btn-primary">
  			</form>
         <h4 class="text-danger" style="padding:10px 0 0 10px"><?php echo $msg; ?> </h4>
  	</div>
    <div class="clearfix"></div>
    <?php echo $url; ?>
  </div>
</div>
<?php
 require 'assist/footer.php';
?>