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

if(isset($_POST['upload']))
{
  $tid=$_SESSION['faculty_id'];
  $title=$_POST['file_title'];
  $file_name=$_FILES['file']['name'];
  $tmp_name=$_FILES['file']['tmp_name'];
  $serverPath="materials/".$file_name;
  $addMaterials=$connect->query("
   INSERT INTO materials(title,Teacher_id,File_path)
   VALUES('$title',$tid,'$serverPath')");
  if($addMaterials)
  {
    move_uploaded_file($tmp_name, $serverPath);
    $msg="Uploaded";
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
              data-bvalidator="required">
							<input type="file" name="file" class="form-control-file" style=" width: 200px; height:35px; margin:5px 0 10px 0"
              data-bvalidator="extension[pdf:rar],required" data-bvalidator-msg="Please select file of type .rar,.zip">
							<input type="submit" name="upload" value="Upload" class="btn btn-info">
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