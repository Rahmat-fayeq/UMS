<?php
include 'assist/header.php';
include 'actions/database.php';
$msg="";
 $total_replies=0;
if(isset($_SESSION['student_id']))
{
include 'assist/student_header.php';
}
else
{
  header('location:login.php');
  include 'assist/main_header.php';
}

// get question
if(isset($_GET['qid']))
{
  $qid=$_GET['qid'];
  $select=$connect->query("
    SELECT Question,question_date FROM questions WHERE Question_id='$qid'");
   $row=$select->fetch_object();
}
// reply a comment
if(isset($_POST['reply']))
{
    $answer=$connect->real_escape_string($_POST['comment']);
    $std_id=$_SESSION['student_id'];
    $date=date('Y/m/d');
    if(!empty($answer))
    {
        $reply=$connect->query("INSERT INTO answer(answer,Question_id,Student_id,answer_date)
        VALUES('$answer',$qid,$std_id,'$date')");
        if($reply)
        {
          $msg="Successed";
        }
        else
        {
          $msg="failed";
        }
    }
    else
    {
      $msg="Please Write your Answer!";
    }
}

// get all reply
$reply="
  SELECT * FROM answer JOIN questions ON questions.Question_id=answer.Question_id JOIN students  ON (answer.Student_id=students.Student_id) WHERE questions.Question_id=$qid";
  $getreply=$connect->query($reply);

// count replay
 $count_reply=$connect->query(" SELECT count(answer_id) AS total FROM answer JOIN questions ON questions.Question_id=answer.Question_id JOIN students  ON (answer.Student_id=students.Student_id) WHERE questions.Question_id=$qid");
   $numberOfRows=$count_reply->fetch_object();
  $total_replies= $numberOfRows->total;


?>
<div class="view_question">
   <div class="container">
   	<div class="row">
   	
   		  <div class="col-md-6 col-md-offset-3 question">
   	    		<h4><?php echo $row->Question;?>
            <small> Asked:<?php echo $row->question_date?></small></h4>
   	    		<hr>
       <h2>Replies(<?php  echo $total_replies ?>)</h2>
   	       </div>
   		  </div>
   		  <div class="col-md-3"></div>
   	</div>
  <div class="row">
    <div class=" post col-md-6 col-md-offset-3">
       <div class="card ">
              <h5 class="card-header">Leave Your Answer:</h5>
              <div class="card-body">
                <form method="post">
                  <div class="form-group">
                    <textarea class="form-control" rows="3" name="comment"></textarea>
                  </div>
                  <button type="submit" name="reply" class="btn btn-primary">Submit</button>
                  <span class="text text-info"><?php echo $msg;?></span>
                </form>
              </div>
          </div>
       </div>
    </div>
    <?php if( $row=$getreply->num_rows!=0 )
    {  
      while($r=$getreply->fetch_object()){ 

       ?>
     <div class="row allanswer">
     	<div class="row ">
   	    	<div class="col-md-3"></div>
   	    	<div class="col-md-6 detail">
   	    		<img src="actions/images/<?php echo $r->image?>" class="img-circle" alt="user image" width="75" height="75">
   	    		<div class="post_details">
   	    		<h4><?php echo $r->First_name; ?> <small><?php echo $r->answer_date;?></small></h4>
   	    		<p><?php echo $r->answer;?></p>
   	    	   </div>
   	    	</div>
   	    	<div class="col-md-3"></div>
   	    </div>
     </div>
    <?php } } else { ?>

     <div class="row allanswer">
      <div class="row ">
          <div class="col-md-3"></div>
          <div class="col-md-6 detail">
            <h2 style="" align="center" class="text text-info">No Answer Fount</h2>
          </div>
          <div class="col-md-3"></div>
        </div>
     </div>
      <?php  }?>
  



</div>
</div>

<?php  include 'assist/footer.php';?>