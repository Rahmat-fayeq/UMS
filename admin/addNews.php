<?php  

include'actions/database.php';
if(!isset($_SESSION['email']))
    {
        header('location:login.php');
    }

include('top_header.php'); 
include('left_menu.php');
if(isset($_POST['post']))
{
  $title=$_POST['title'];
  $news=$_POST['news'];
  $date=date('Y/m/d');
  $image_name=$_FILES['image']['name'];
  $imagePath="images/".$image_name;
  $imageTmp=$_FILES['image']['tmp_name'];

  $addnews=$connect->query("
    INSERT INTO news(title,image,body,post_date)
    VALUES('$title','$imagePath','$news','$date')");
 if($addnews)
 {
    move_uploaded_file($imageTmp, $imagePath);
    echo "<script>alert('successed');</script>";
 }
 else
 {
  echo "fail";
 }
}
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       ADD NEW NEWS
  
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage news</a></li>

      </ol>
    </section>

        <section class="content">

      <div class="row">
        <div class="col-xs-10">      
          <!-- /.box-header -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage News</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <form method="post" class="form-group" enctype="multipart/form-data" id="newForm">
                      <label>Enter New Title:</label>
                      <input type="text" name="title" placeholder="New Title" class="form-control" data-bvalidator="required">
                      <label>Select one Image:</label>
                      <input type="file" name="image" data-bvalidator="required,extension[jpg:png]" data-bvalidator-msg="Select img with extension jpg,png" >
                      <label>Write the News</label>
                      <textarea class="form-control" rows="10" cols="20" placeholder="Wrtie The New Here!" data-bvalidator="required" name="news"></textarea>
                      <input type="submit" name="post" value="Post" class="btn btn-info">
                  </form>

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
<script type="text/javascript">
  $(document).ready(function(){
    $("#newForm").bValidator();
  });
</script>