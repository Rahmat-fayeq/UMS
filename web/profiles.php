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
// get student id and fatch all his/her info
if(isset($_GET['id']))
{
   $id=$_GET['id'];
   $select="SELECT * FROM students JOIN department ON students.Department_id=department.Department_id WHERE Student_id=$id";
   $query=$connect->query($select);
   if($query->num_rows>0)
   {
      $row=$query->fetch_object();
   }
}
$student_id=$_SESSION['student_id'] ;
$getQuestion=$connect->query("SELECT * FROM  questions JOIN students ON questions.Student_id=students.Student_id WHERE students.student_id=$student_id ");
?>


<div class="test" >
  <div class="container">
       <div>
        <img src="actions/images/<?php echo $row->image?>" class="img-thumbnail">
          <div class="details">
          <h3>Name:&nbsp <small><?php echo $row->First_name .' '.$row->Last_name; ?></small></h3>
          <h3>User Name:&nbsp <small><?php echo $row->User_name?></small> </h3>
          <h3>Department:&nbsp <small><?php echo $row->Department_name?></small></h3>
          <h3>DOB:&nbsp <small><?php echo $row->DOB?></small></h3>
          <h3>Adress:&nbsp <small><?php echo $row->Address?></small></h3>
          <h3>Phone:&nbsp <small><?php echo $row->Phone?></small></h3>
         </div>
         <table class="table table-hover">
           <thead>
             <th width="3%">#</th>
             <th width="64%">Your Question</th>
             <th width="18%">NO Of Answers</th>
             <th width="10%">Aproved</th>
             <th width="5%">Edit</th>
             <th width="5%">Delete</th>
             <th width="5%">View</th>
           </thead>
           <?php if($rows=$getQuestion->num_rows>0){
            $i=0;
            while($r=$getQuestion->fetch_object()){
              $i++;

              $qid=$r->Question_id;
               $count_reply=$connect->query(" SELECT count(answer_id) AS total FROM answer JOIN questions ON questions.Question_id=answer.Question_id WHERE questions.Question_id=$qid");
                 $numberOfRows=$count_reply->fetch_object();
                $total_replies= $numberOfRows->total;
            ?>
           <tr>
             <td align="center" width="5%"><?php echo $i;?></td>
             <td width="64%"><?php echo $r->Question?></td>
             <td width="20%" align="center"><?php echo $total_replies?></td>
             <td width="10%" align="center"><?php echo $r->question_status?></td>
             <td><a href="edit_question.php?qid=<?php echo $r->Question_id?>"><button class="btn btn-secondary">Edit</button></a></td>
             <td><a onclick="return confirm('Please confirm deletion')"  href="actions/delete_question.php?qid=<?php echo $r->Question_id?>""><button class="btn btn-danger">Delete</button></a></td>
             <td><a href="view_question.php?qid=<?php echo $r->Question_id?>""><button class="btn btn-secondary">View</button></a></td>
           </tr>
            <?php } } else { ?>
           <tr>
            <td align="center" colspan="7"><h2 class="text text-info">No Questions Fount</h2></td>
           </tr>  
           <?php }?>
         </table>
         <table>
             <tr>
               <td></td>
             </tr>
         </table>
  
       <div style="padding-bottom: 250px"></div>
  </div>
</div>
<?php
include 'assist/footer.php';

?>