<?php  

include'actions/database.php';
if(!isset($_SESSION['email']))
    {
        header('location:login.php');
    }

include('top_header.php'); 
include('left_menu.php');
// upload the new photo to gallery
if(isset($_POST['upload']))
{
  $title=$_POST['title'];
  $date=date('Y/m/d');
  $image_name=$_FILES['image']['name'];
  $imagePath="gallary/".$image_name;
  $imageTmp=$_FILES['image']['tmp_name'];

  $uploadImage=$connect->query("
    INSERT INTO gallery(title,image,upload_date)
    VALUES('$title','$imagePath','$date')");
 if($uploadImage)
 {
    move_uploaded_file($imageTmp, $imagePath);
    echo "<script>alert('successed');</script>";
 }
 else
 {
  echo "fail";
 }
}

// get all photo from gallery
$getPhotos=$connect->query("SELECT *FROM gallery");
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Upload new Image
  
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Images</a></li>

      </ol>
    </section>

        <section class="content">

      <div class="row">
        <div class="col-xs-8">      
          <!-- /.box-header -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Images</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <form method="post" class="form-group" enctype="multipart/form-data" id="imageForm">
                      <label>Enter Image Title:</label>
                      <input type="text" name="title" placeholder="New Title" class="form-control" data-bvalidator="required">
                      <label>Select one Image:</label>
                      <input type="file" name="image" data-bvalidator="required,extension[jpg:png]" data-bvalidator-msg="Select img with extension jpg,png" >
                      <input type="submit" name="upload" value="Upload" class="btn btn-info">
                  </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Images</h3>
            </div>
             <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                         <th>ID</th>
                         <th>Title</th>
                         <th>Image</th>
                         <th>Delete</th>
                        
                       </thead>
                       <tbody>
                  <?php while($img=$getPhotos->fetch_object()){?>
                   <tr>
                     <td><?php echo $img->id?></td>
                     <td><?php echo $img->title?></td>
                     <td><img src="<?php echo $img->image ?>" style="width: 250px; height: 100px">
                     </td>
                     <td><a href="actions/delete_photo.php?iid=<?php echo $img->id?>" onclick="return confirm('Are you Sure')"><button class="btn btn-danger">Delete</button></a></td>
                   </tr>
                   <?php }?>
                       </tbody>
                   </table>
                 
              </div>

           </div>
         </div>

        </div>
     
        
      </div>
    </section>
    <!-- /.content -->
  </div>

<?php
include('footer.php');
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#imageForm").bValidator();
  });
</script>