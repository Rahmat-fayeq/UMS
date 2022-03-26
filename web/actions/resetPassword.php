<?php
   include 'database.php';
   error_reporting(0);
   $msg="";
   if(isset($_GET['email']) && isset($_GET['token']) && isset($_GET['role']))
   {
        $email=$_GET['email'];
        $token=$_GET['token'];
        $role= $_GET['role'];

         if($role=='teacher')
         {
               echo $role;
            $data=$connect->query(
               "SELECT Teacher_id FROM teachers WHERE User_name=$email AND token=$token");
               if($data->num_rows>0)
               {
                $trow=$data->fetch_object();
                $Teacher_id=$trow->Teacher_id;
               }
         }
         if($role=="student")
         {
          
               $data=$connect->query("
                SELECT Student_id FROM students WHERE User_name=$email AND token=$token");
               if($data->num_rows>0)
               {
                $srow=$data->fetch_object();
                $Student_id=$srow->Student_id;
               
               }
               
         }

       
   }
   else
   {
       header('location:../login.php');
   }

   if(isset($_POST['reset']))
   {
        $newp=$_POST['newpass'];
        $role=$_GET['role'];
        
        $cpass=$_POST['confirmpass'];
        $passLen=strlen($newp);
        if($cpass==$newp && $passLen>=6)
        {
         $password=password_hash($newp,PASSWORD_BCRYPT);
         if($role=="student")
         {
         $update=$connect->query("
            UPDATE students SET password='$password', token=' '
            WHERE Student_id='$Student_id'");
            $msg="Your Password Updated Successfuly";
            header('location:../login.php');
         }
         if($role=="teacher")
         {
           
            $update=$connect->query("
            UPDATE teachers SET password='$password', token=''
            WHERE Teacher_id=$Teacher_id");
            echo "<script>alert('Your Password Updated Successfuly);</script>";
            header('location:../login.php');
            
         }
      
        
        }
        else
        {
         $msg="Password Are Match Or Greter Then 6 Digits!".$passLen;
        }
   }
?>

<!DOCTYPE html>
<html>
<head>
   <title></title>
   <style type="text/css">
      div
      {
         width: 350px;
         height: 300px;
         background-color: #ffffff;
         margin: 0 auto;
         padding: 20px; 
         
      }
      form input[type=text]
      {
         width: 190px;
         height: 25px;
         margin-top: 3px;
         border-radius: 3px;
      } 
      input[type=submit]
      {
         padding: 5px;
         margin:5px 0 0 0;
      }

   </style>
</head>
<body>
      <div>
         <fieldset>
         <legend>Change Your Password</legend>
          <form method="post">
            <label>Enter Your New Password:</label><br>
            <input type="password" name="newpass" placeholder ="New Password" required=""><br>
            <label>Confirm Your New Password:</label><br>
            <input type="password" name="confirmpass" placeholder="Confimr Password" required=""><br>
            <input type="submit" name="reset" value="Reset">
          </form>
           <h3><?php echo $msg;?></h3>
          </fieldset>

      </div>
</body>
</html>