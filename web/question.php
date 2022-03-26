<?php
error_reporting(0);
session_start();
$msg="";
include 'assist/header.php';
include 'actions/database.php';
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
// add question
if(isset($_POST['postQuestion']))
{
    $date=date('Y/m/d');
    $Student_id=$_SESSION['student_id'];
    $question=$connect->real_escape_string($_POST['question']);
    if(!empty($question))
    {
       $insert="
      INSERT INTO questions(Question,Student_id,question_date)
      VALUES('$question','$Student_id','$date')";
      $addQuestion=$connect->query($insert);
      if($addQuestion)
      {
         $msg="You have added your question successfuly<br>
         wait for Admin aprovement !";
      }
      else
      {
         $msg="Try Again";
      }
    }
    else
    {
     $msg="Plaase Write Your Question!";
    }
}

// select all question
$select="
      SELECT * FROM questions JOIN students ON questions.Student_id=students.Student_id WHERE questions.question_status='aproved' ORDER BY Question_id DESC";

  $selectQuestion=$connect->query($select);
  $question_per_page=6;
  $total_question=$selectQuestion->num_rows;
  $total_pages=ceil($total_question/$question_per_page);
if(!isset($_GET['page']))
{
  $page=1;
}
else{
  $page=$_GET['page'];
}
 $first_page=($page-1)*$question_per_page;
 $getQ="SELECT * FROM questions JOIN students ON questions.Student_id=students.Student_id WHERE questions.question_status='aproved' LIMIT $first_page,$question_per_page";
 $query=$connect->query($getQ);
?>
<div class="questions">
   <div class="container" style="background-color: #FFFFFF">
       
   	    <div class="row">
   	    	<div class="col-md-3"></div>
   	    	<div class="col-md-6">
               <h3 class="text text-info"><?php echo $msg; ?></h3>
               <h3>Ask Your Question !</h3>
   	    		<form method="post">
   	    			<textarea rows="5" cols="70" placeholder="Ask Your Question..!" type="textarea" class="form-control" name="question"></textarea>
   	    			<button type="submit" name="postQuestion" 
   	    			class="btn btn-info form-control">Post Your Question</button>
   	    		</form>
   	    	</div>
   	    	<div class="col-md-3"></div>
   	    </div>
        
   	  <div class="all_question">
       <?php if($query->num_rows>0){
            while($row=$query->fetch_object()){
          ?>
   	    <div class="row ">
   	    	<div class="col-md-3"></div>
   	    	<div class="col-md-6 detail">
   	    		<img src="actions/images/<?php echo $row->image;?>" class="img-circle" alt="user image">
   	    		<div class="post_details">
   	    		<h4><?php echo $row->First_name;?> <small><?php echo $row->question_date; ?></small></h4>
   	    		<p><?php echo $row->Question; ?>adada <a href="view_question.php?qid=<?php echo $row->Question_id;?>"> Reply Your Answer</a></p>
   	    	   </div>

   	    	</div>
   	    	<div class="col-md-3"></div>
   	    </div>
   	     <?php } }?>

   	    <div class="row">
	   	    <div class="col-md-6 col-md-offset-3 pagenation">
	   	    	<ul class="pagination">
              <li class="disabled"><a class="page-link" href="#">Previous</a></li>
              <?php for ($page=1; $page<=$total_pages ; $page++) { 
              ?>
                <li><a href="question.php?page=<?php echo $page;?>"><?php echo $page;?></a></li>
              <?php

              }?>
	   	  <li class="disabled"><a class="page-link" href="#">Next </a></li>
	   	    	</ul>
	   	    </div>
	   	</div>
   	    </div>
   </div>
 
</div>
<?php
include 'assist/footer.php';

?>