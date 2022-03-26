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

// get all news 
$getAllNews=$connect->query("SELECT *FROM news");
?>
 <!-- Page Content -->
   
    <main role="main" style="background-color:white;">
    
        <div class="container" style="padding:50px ">
          <div class="row">
            <?php while($r=$getAllNews->fetch_object()){?>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
               <img class="card-img-top" src="../admin/<?php echo $r->image?>">
                <div class="card-body">
                  <h3 class="card-title"><?php echo $r->title?></h3>
                  <p class="card-text">
                    <?php echo substr($r->body,0,180).'...'?>
                   </p>
                    <div class="btn-group">
                      <a href="news_details.php?nid=<?php echo $r->id?>" style="color:black">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Read More..</button></a>
                    </div>
                </div>
              </div>
            </div>
            <?php }?>
           
          
          </div>
          

      </div>

    </main>


  <!-- Footer -->
  <?php include 'assist/footer.php'; ?>