<?php

include'actions/database.php';
if(!isset($_SESSION['email']))
    {
        header('location:login.php');
    }
include('top_header.php'); 
include('left_menu.php');
if(isset($_GET['aid']))
{
  $aid=$_GET['aid'];
  $getArticles=$connect->query("SELECT *FROM articles JOIN teachers ON articles.Teacher_id=teachers.Teacher_id WHERE articles.Article_id=$aid");
  if(!$getArticles->num_rows>0)
  {
    echo "page not fount";
  }
  $row=$getArticles->fetch_object();

}
else
{
  header('location:newarticles.php');
}


?>

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Articles 
        <small>Reading New Article</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage articles</a></li>
     
      </ol>
    </section>

        <section class="content">

      <div class="row">
        <div class="col-xs-10">      
          <!-- /.box-header -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage articles</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="box-body" style="overflow-x: scroll;">  
             
              <h3><?php echo $row->Article_title?></h3><br>
               <p><?php echo nl2br($row->Article_body)?></p>
              
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<?php
include('footer.php');
?>