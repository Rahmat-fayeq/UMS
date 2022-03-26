<?php
include 'assist/header.php';
include 'actions/database.php';
$msg="";
if(!isset($_SESSION['student_id']))
{
   if(isset($_SESSION['faculty_id']))
   {
      header('location:index.php');
   }
   else
   {
   header('location:login.php');
   }
}
if(isset($_SESSION['student_id']))
{
  include 'assist/student_header.php';
}

if(isset($_GET['qid']))
{
	$qid=$_GET['qid'];
	$sid=$_SESSION['student_id'];
	$selectQ=$connect->query("SELECT * FROM questions WHERE Question_id=$qid AND Student_id=$sid ");
	$row=$selectQ->fetch_object();
}
else
{
	echo "<h2> try again </h2>";
	exit();
}
if(isset($_POST['EditQuestion']))
{
	$question=$_POST['question'];
	$qid=$_POST['qid'];
	$sid=$_SESSION['student_id'];
	$up=$connect->query("UPDATE questions SET Question='$question' WHERE Question_id=$qid AND Student_id=$sid");
	if($up)
	{
		header("location:profiles.php?id=$sid");
	}
	else
	{
		$msg="try Again";
	}
	
}
?>
<div class="questions" style="padding-bottom: 220px">
   <div class="container" style="background-color: #FFFFFF" >
       
   	    <div class="row">
   	    	<div class="col-md-3"></div>
   	    	<div class="col-md-6">
               <h3 class="text text-info"><?php echo $msg; ?></h3>
               <h3>Edit Your Question !</h3>
   	    		<form method="post">
   	    			<textarea rows="5" cols="70" type="textarea" class="form-control" name="question"><?php echo $row->Question; ?></textarea>
   	    			<input type="hidden" name="qid" value="<?php echo $row->Question_id;?>">
   	    			<button type="submit" name="EditQuestion" 
   	    			class="btn btn-info form-control">Edit Your Question</button>
   	    		</form>
   	    	</div>
   	    	<div class="col-md-3"></div>
   	    </div>

   	</div>
   </div>
   <?php include 'assist/footer.php'; ?>