
<?php
require 'assist/header.php';
include 'actions/database.php';
if(!isset($_SESSION['student_id']))
{
  if(isset($_SESSION['faculty_id']))
  {
      include 'assist/faculty_header.php';
  }
  else
  {
    include 'assist/main_header.php';
  }
}

if(isset($_SESSION['student_id']))
{
  include 'assist/student_header.php';
}
if(isset($_SESSION['faculty_id']))
{
   include 'assist/faculty_header.php';
}
?>
    <div class="login">
        <form class="form-signin" method="post" id="loginform">
        <p class="text-danger text-left bold" style="font-size:18px" id="error"></p>
        <h2 class="form-signin-heading">Sign In!</h2>
         <label for="email" class="sr-only">Email address</label>
          <input type="text" class="form-control" placeholder="Email address" autofocus name="email" id="email" 
          data-bvalidator="email,required" 
          value="">

          <label for="password" class="sr-only">Password</label>
          <input type="password" class="form-control" placeholder="Password"  name="password" id="password" 
          data-bvalidator="required" >

          <select class="form-control" id="role" name="role"
          data-bvalidator="required" data-bvalidator-msg="Select One options">
            <option disabled selected>-Select Your Role-</option>
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
          </select>
          
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="1" name="remember_me" id="remember_me"> Remember me
                </label>
                <label><a href="forgetPassword.php">Forget Password?</a></label>
              </div>

              <input class="btn btn-lg btn-primary btn-block" type="submit" name="login" id="login" value="Sign in">
            </form>
     </div>
     <!-- login -->
<?php
 require 'assist/footer.php';
?>
<script type="text/javascript">
  $(document).ready(function(){
      $('#loginform').bValidator();
      $("#loginform").on('submit',function(event){
          event.preventDefault();
          $.ajax({
                    url:"do_signIn.php",
                    data:$("#loginform").serialize(),
                    method:"POST",
                    success:function(data)
                    {
                        if(data=="success")
                        {    
                        $(location).attr('href','index.php');
                        }
                        if(data=="Invalid_Password")
                        {
                          $("#error").html("Invalid Password !");
                        }
                        if(data=='Invalid_Email')
                        {
                          $("#error").html("Invalid Email Address !");
                        }
             
                    }

                 });
      });

  });
</script>
<!-- Cookies -->
<?php
if(isset($_COOKIE['student_user_name']) && isset($_COOKIE['student_password']))
{
     $email=$_COOKIE['student_user_name'];
     $pass=$_COOKIE['student_password'];
    echo "
      <script>
        document.getElementById('email').value='$email';
        document.getElementById('password').value='$pass';
      </script>
     ";
}

/*if(isset($_COOKIE['teacher_user_name']) && isset($_COOKIE['teacher_password']))
{
     $email=$_COOKIE['teacher_user_name'];
     $pass=$_COOKIE['teacher_password'];
    echo "
      <script>
        document.getElementById('email').value='$email';
        document.getElementById('password').value='$pass';
      </script>
     ";
}*/

?>

