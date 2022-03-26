<?php
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

$getMaterials=$connect->query("SELECT *FROM materials JOIN teachers ON materials.Teacher_id= teachers.Teacher_id");
?>
<div class="donload">
   <div class="container">
   	
   		<table class="table table-hover">
   			<thead>
   				<th>#</th>
   				<th>Name</th>
   				<th>Faculty Name</th>
   				<th>Downlaod</th>
   			</thead>
            <?php if($getMaterials->num_rows>0){
               $i=0;
               while($r=$getMaterials->fetch_object()){
                  $i++;
               ?>
   			<tr>
   				<td><?php echo $i;?></td>
   				<td><?php echo $r->title?></td>
   				<td><?php echo $r->First_name." ".$r->Last_name?></td>
   				<td><a href="<?php echo $r->File_path?>"><button class="btn">Download</button></a></td>
   			</tr>
            <?php } } else{?>
   			<tr>
   				<td colspan="4"><h2 class="text-info">Not Found</h2></td>
   			</tr>
            <?php }?>
   		</table>
   </div>

</div>
<?php include 'assist/footer.php';?>