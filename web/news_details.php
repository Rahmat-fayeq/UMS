<?php
include 'assist/header.php';
include 'actions/database.php';
if(isset($_SESSION['student_id']))
{
include 'assist/student_header.php';
}
if(isset($_SESSION['faculty_id']))
{
  include 'assist/faculty_header.php';
}
if(!isset($_SESSION['faculty_id']) && !isset($_SESSION['student_id']))
{
 include 'assist/main_header.php';
}
// get particular news
if(isset($_GET['nid']))
{
  $nid=$_GET['nid'];
  $getOneNews=$connect->query("SELECT *FROM news WHERE id=$nid");
  $r=$getOneNews->fetch_object();
}
else
{
  header('location:news.php');
}
?>
    <!-- Page Content -->
    <div class="post">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-12">

          <!-- Title -->
          <h1 class="mt-4"><?php echo $r->title?></h1>
          <hr style="margin:2px 0;">
          <!-- Date/Time -->
          <p>Posted on <?php echo $r->post_date?></p>
          <!-- Preview Image -->
          <img class="img-fluid rounded " src="../admin/<?php echo $r->image?>" alt="">
          <hr>

          <!-- Post Content -->
          <?php echo nl2br($r->body)?>
          <hr>
        <!-- commend-->
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>



           <div class="media mb-4">
            <img class="img-rounded user" src="images/user.jpg" alt="user">
            <div class="media-body">
              <h5 class="mt-0">Alex</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>

           <div class="media mb-4">
            <img class="img-rounded user" src="images/user.jpg" alt="user">
            <div class="media-body">
              <h5 class="mt-0">Farhod</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>

      </div>
    </div>
  </div>

      <!-- /.row -->

    <!-- /.container -->
   <?php  include'assist/footer.php';?>