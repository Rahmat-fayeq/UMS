<?php
error_reporting(0);
session_start();
$msg="";
include 'assist/header.php';
include 'actions/database.php';
if(isset($_SESSION['student_id']))
{
include 'assist/student_header.php';
}
else if(isset($_SESSION['faculty_id']))
{
  include 'assist/faculty_header.php';
}
else
{
  include 'assist/main_header.php';
}

if(isset($_GET['aid']))
{
  $artilce_id=$_GET['aid'];
  $getArticleDetails=$connect->query(
    "SELECT * FROM articles JOIN teachers ON articles.Teacher_id=teachers.Teacher_id WHERE Article_id=$artilce_id");
  $row=$getArticleDetails->fetch_object();
}
else
{
  header('location:articles.php');
}


//add  comment section

if(isset($_POST['Post']))
{

  if(isset($_SESSION['student_id']))
  {
     $comment=$_POST['comment'];
     $uid=$_SESSION['student_id'];

     $addComment="
      INSERT INTO articles_comments(comment_body,userid,role,Article_id) 
      VALUES('$comment','$uid','student','$artilce_id')";
     $query=$connect->query($addComment);
     if($query)
     {
      $msg="Successed";
     }
     else
     {
      $msg="Try Again!";
     }
  }
  else if(isset($_SESSION['faculty_id']))
  {
    $comment=$_POST['comment'];
    $uid=$_SESSION['faculty_id'];

     $addComment="
      INSERT INTO articles_comments(comment_body,userid,role,Article_id) 
      VALUES('$comment','$uid','teacher','$artilce_id')";
     $query=$connect->query($addComment);
     if($query)
     {
      $msg="Successed";
     }
     else
     {
      $msg="Try Again!";
     }
  }
  else
  {
     $msg="Sorry! Something is Wrong";
  }
}

//get all comments 
$c="SELECT * FROM articles_comments WHERE Article_id='$artilce_id'";
$getComments=$connect->query($c);
//echo $c;

?>

<div class="post">
      <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-12">
          <!-- Title -->
          <h2 class="mt-4"><?php echo $row->Article_title;?></h2>
          <hr style="margin:2px 0;">
          <!-- Date/Time -->
          <p>Author:&nbsp <?php echo $row->Author_name?> &nbsp&nbsp 
            Published Date: <?php echo $row->uploadDate?></p>
          <!-- Preview Image -->
          <img class="img-fluid rounded " src="actions/images/<?php echo $row->image?>" alt="">
          <hr>

          <!-- Post Content -->
          <p>
            <?php echo nl2br($row->Article_body)?>
          </p>
          <hr>
        <!-- commend-->
        <?php if(isset($_SESSION['faculty_id']) || isset($_SESSION['student_id'])) {?>
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form method="post">
                <div class="form-group">
                  <textarea class="form-control" rows="3" name="comment" required=""></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="Post">Submit</button><span class="text-info"><?php echo $msg;?></span>
              </form>
            </div>
        </div>
        <?php }?>

           <?php if($getComments->num_rows>0){
            while($r=$getComments->fetch_object())
            {
               if($r->role=='student'){
                  $id=$r->userid;
                $getSt=$connect->query("SELECT *FROM students WHERE student_id=$id");
                $str=$getSt->fetch_object();
                ?>
              <div class="media mb-4">
                <img class="img-rounded user" src="actions/images/<?php echo $str->image?>" alt="user" >
                <div class="media-body">
                  <h5 class="mt-0"><?php echo $str->First_name ?></h5>
                  <?php echo $r->comment_body?>
                </div>
              </div>
              <hr>
                <?php 
               }
              elseif($r->role=='teacher'){
                  $id=$r->userid;
                $getSt=$connect->query("SELECT *FROM teachers WHERE teacher_id=$id");
                $tr=$getSt->fetch_object();
        ?>

         <div class="media mb-4">
            <img class="img-rounded user" src="actions/images/<?php echo $tr->image?>" alt="user">
            <div class="media-body">
              <h5 class="mt-0"><?php echo $tr->First_name?></h5>
            <?php echo $r->comment_body?>
            </div>
          </div>
            <hr>

        <?php
               }
            ?>

         
          <?php } }else{?>

           <div class="media mb-4">
              <h2>No Comment Found</h2>
          </div>
          <?php }?>

      </div>
    </div>
  </div>

  <?php include 'assist/footer.php';?>