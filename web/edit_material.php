<?php
include 'assist/header.php';
include 'actions/database.php';
  $msg="";

if(!isset($_SESSION['student_id']))
{
   if(isset($_SESSION['faculty_id']))
   {
     include 'assist/faculty_header.php';
   }
   else
   {
   header('location:index.php');
   }
}
if(isset($_SESSION['student_id']))
{
  header('location:index.php');
}
// get particular materials info
if(isset($_GET['eid']))
{
  $mid=$_GET['eid'];
  $getMeterial=$connect->query("SELECT *FROM materials WHERE Material_id=$mid");
  $rows=$getMeterial->fetch_object();  
}
else
{
  $id=$_SESSION['faculty_id'];
  header("location:profiles_f.php?id=$id");
}
// edit materials
if(isset($_POST['edit']))
{
  $tid=$_SESSION['faculty_id'];
  $title=$_POST['file_title'];
  $file_name=$_FILES['file']['name'];
  $tmp_name=$_FILES['file']['tmp_name'];
  $serverPath="materials/".$file_name;
  $addMaterials=$connect->query("
   UPDATE materials SET title='$title',Teacher_id=$tid,File_path='$serverPath' WHERE Material_id=$mid");
  if($addMaterials)
  {
    move_uploaded_file($tmp_name, $serverPath);
    $msg="Updattion Successed";
  }
  else
  {
    $msg="Try Again!";
  }
}
?>

   <div class="upload">
   	<div class="container">
   	<div class="row">
   		<div class="col-md-6 col-md-offset-3">
   			<div class="panel panel-default">
		      <div class="panel-heading">Upload Your Materials For The Students</div>
			    <div class="panel-body">
                 <fieldset>    	
			<!-- 		<legend>Upload</legend> -->
					 <div class="panel panel-default">
						<div class="panel-body">
              <form method="post" enctype="multipart/form-data" id="materials">
							<label>Enter The Title:</label>
							<input type="text" name="file_title" class="form-control"
              data-bvalidator="required" value="<?php echo $rows->title?>">
							<input type="file" name="file" class="form-control-file" style=" width: 200px; height:35px; margin:5px 0 10px 0"
              data-bvalidator="extension[zip:rar:],required" data-bvalidator-msg="Please select file of type .rar,zip">
							<input type="submit" name="edit" value="Edit" class="btn btn-info">
              <span class="text-info"><?php echo $msg;?></span>
            </form>
						</div>
					</div>
					
				</fieldset>				
				
				<div class="clearfix"></div>
              </div>
                
             </div>
   				</div>
   			</div>



   	</div>
   </div>



<?php  
include 'assist/footer.php';
?>

<script type="text/javascript">
  $(document).ready(function(){
    $("#materials").bValidator();
  });
</script>