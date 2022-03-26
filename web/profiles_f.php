<?php
include 'assist/header.php';
include 'actions/database.php';
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
// get the student id and fatch all his/her info
if(isset($_GET['id']))
{
   $id=$_GET['id'];
   $select="SELECT * FROM teachers JOIN faculties ON teachers.Faculty_id=faculties.Faculty_id WHERE Teacher_id=$id";

   $query=$connect->query($select);
   if($query->num_rows>0)
   {
      $row=$query->fetch_object();
   }
}

// get articles info
$getArticles=$connect->query("
  SELECT *FROM articles WHERE Teacher_id=$id");

// get Materials
$getMaterial=$connect->query("
  SELECT *FROM materials WHERE Teacher_id=$id");
?>
<div class="test" >
  <div class="container">
       <div class="row">
        <img src="actions/images/<?php echo $row->image; ?>" class="img-thumbnail" alt="user Image">
          <div class="details">
          <h3>Name:&nbsp <small><?php echo $row->First_name.' '.$row->Last_name?></small></h3>
          <h3>User Name:&nbsp <small><?php echo $row->User_name;?></small> </h3>
          <h3>Faculty:&nbsp <small><?php echo $row->Faculty_name ?></small></h3>
          <h3>DOB:&nbsp <small><?php echo $row->DOB?></small></h3>
          <h3>Adress:&nbsp <small><?php echo $row->Address?></small></h3>
           <h3>Phone:&nbsp <small><?php echo $row->Phone?></small></h3>
         </div>
     <div class="col-md-6">
         <table class="table table-hover">
           <thead>
             <th >#</th>
             <th>Article Title</th>
             <th>Contain</th>
             <th>Delete</th>
             <th>Edit</th>
           </thead>
           <?php  if($getArticles->num_rows>0){
            $i=0;
            while($r=$getArticles->fetch_object()){ $i++;?>
           <tr>
             <td align="center" width="5%"><?php echo $i;?></td>
             <td><a href="artilce_details.php?aid=<?php echo $r->Article_id?>"><?php echo $r->Article_title?></a></td>
             <td><?php echo substr($r->Article_body,0,50)."..."?></td>
             <td><a onclick="return confirm('Are you Sure?')" href="actions/delete_article.php?aid=<?php echo $r->Article_id?>"><button class="btn btn-danger">Delete</button></a></td>
             <td><a href="edit_article.php?aid=<?php echo $r->Article_id?>">
              <button class="btn btn-secondary">Edit</button>
            </a></td>
           </tr>
           <?php }} else {?>
           <tr>
            <td align="center" colspan="5"><h2>No Article Fount</h2></td>
           </tr>
           <?php }?>
         </table>
    </div>
         <div class="col-md-6">
              <table class="table table-hover">
           <thead>
             <th>#</th>
             <th width="40%">Materials Title</th>
             <th>File</th>
             <th>Delete</th>
             <th>Edit</th>
           </thead>
           <?php if($getMaterial->num_rows>0){
            $i=0;
            while($r=$getMaterial->fetch_object()){ $i++?>
           <tr>
             <td align="center" width="5%"><?php echo $i;?></td>
             <td><?php echo $r->title?></td>
             <td><?php echo $r->File_path?></td>
             <td><a onclick=" return confirm('Are you Sure?')" href="actions/delete_materials.php?did=<?php echo $r->Material_id;?>"><button class="btn btn-danger">Delete</button></a></td>
             <td><a href="edit_material.php?eid=<?php echo $r->Material_id ?>"><button class="btn btn-secondary">Edit</button></a></td>
           </tr>
           <?php }} else{?>
           <tr>
              <td colspan="5" align="center"><h2 class="text-info">No Materials Fount</h2></td>
           </tr>
           <?php }?>
         </table>
         </div>
    

       <!-- Button trigger modal -->
          <div style="padding-bottom: 340px"></div>
  </div>
</div>
<?php
include 'assist/footer.php';

?>