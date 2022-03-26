<?php 
include'actions/database.php';
if(!isset($_SESSION['email']))
    {
        header('location:login.php');
    }
 
include('top_header.php'); 
include('left_menu.php');

// get department
$getDepartments=$connect->query("SELECT *FROM department");
// get all semester exams
$getSemesterExam=$connect->query("SELECT *FROM exams");
// get subject
$getSubjects1=$connect->query("SELECT *FROM subjects");
$getSubjects2=$connect->query("SELECT *FROM subjects");
$getSubjects3=$connect->query("SELECT *FROM subjects");
$getSubjects4=$connect->query("SELECT *FROM subjects");
$getSubjects5=$connect->query("SELECT *FROM subjects");
$getSubject6 =$connect->query("SELECT *FROM subjects");
// add result
if(isset($_POST['add']))
{
  $name=$_POST['studentName'];
  $setNo=$_POST['studentsetno'];
  $s1m=$_POST['subject1'];
  $s2m=$_POST['subject2'];
  $s3m=$_POST['subject3'];
  $s4m=$_POST['subject4'];
  $s5m=$_POST['subject5'];
  $s6m=$_POST['subject6'];

  $s1=$_POST['s1'];
  $s2=$_POST['s2'];
  $s3=$_POST['s3'];
  $s4=$_POST['s4'];
  $s5=$_POST['s5'];
  $s6=$_POST['s6'];

  $department=$_POST['department'];
  $exam_name=$_POST['exam_name'];
  $average=($s1m+$s2m+$s3m+$s4m+$s5m+$s6m)/6;
  $average=ceil($average);
  $result="";
  $grade="";
  if($average>=75){
     $result="first Class";
     $grade="A";
   }
   elseif ($average>=65) 
   {  $result="Second Class";
      $grade="B";
   }
   elseif ($average>=55) {
      $grade="C";
      $result="pass";
   }
   else
   {
      $grade="D";
      $result="Failed";
   }

   $addData="INSERT INTO results(student_setno,student_name,subject1,subject1_id,subject2,subject2_id,subject3,subject3_id,subject4,subject4_id,subject5,subject5_id,subject6,subject6_id,average,grade,result,department_id,exam_id)
   VALUES('$setNo','$name',$s1m,$s1,$s2m,$s2,$s3m,$s3,$s4m,$s4,$s5m,$s5,$s6m,$s6,$average,'$grade','$result',$department,$exam_name)";

   $query=$connect->query($addData);
   if($query)
   {
     echo "<script>alert('Added')</script>";
   }else
   {
       echo "<script>alert('Fail')</script>";
   }
}
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
    Exam
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Exam</a></li>

      </ol>
    </section>

        <section class="content">

      <div class="row">
        <div class="col-xs-8">      
          <!-- /.box-header -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Exam</h3>
            </div>
            <!-- /.box-header -->
           

            <div class="box-body">
              <div>
                <form method="post" id="DataEnteryForm">
                  <div class="row">
                    <div class="col-xs-6">
                      <label>Enter Student Set No:</label>
                       <input type="text" name="studentsetno" placeholder="Enter Student Set No" class="form-control" data-bvalidator="required,number">
                    </div>

                    <div class="col-xs-6">
                      <label>Enter Student Full Name:</label>
                       <input type="text" name="studentName" placeholder="Enter Student full Name" class="form-control" data-bvalidator="required,alpha">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-6">
                      <label>Select The Department:</label>
                      <select class="form-control" data-bvalidator="required" name="department">
                        <option selected="" disabled="">-Select one Option-</option>
                        <?php while($d=$getDepartments->fetch_object()){?>
                        
                        <option value="<?php echo $d->Department_id?>"><?php echo $d->Department_name?></option>
                        <?php }?>
                      </select> 
                    </div>
                   
                     <div class="col-xs-6">
                      <label>Select The Exam Name:</label>
                       <select class="form-control" data-bvalidator="required" name="exam_name">
                        <option selected="" disabled="">-Select one Option-</option>
                  <?php while($ex=$getSemesterExam->fetch_object()){?>
                        <option value="<?php echo $ex->exam_id?>"><?php echo $ex->exam_name?></option>
               
                        <?php }?>
                      </select>  
                    </div>

                    
                  </div>
                   



                    
                   <div class="row">
                     <div class="col-xs-6">
                       <label>Select Subject Name 1:</label>
                         
                        <select class="form-control" data-bavlidator="required" name="s1"> 
                            <option disabled="" selected="">-slect subject name-</option>
                          <?php while($s=$getSubjects1->fetch_object()){?>
                        
                          <option value="<?php echo $s->subject_id?>"><?php echo $s->subject_name?></option>
                          <?php }?>
                        </select> 
                     </div>
                     <div class="col-xs-6">
                       <label>Enter Mark:</label>
                  <input type="text" name="subject1" placeholder="Enter Subject no 2 mark" class="form-control" 
                  data-bvalidator="required,number"> 
                     </div>

                   </div>


 <div class="row">
                     <div class="col-xs-6">
                       <label>Select Sssubject Name 2:</label>
                
                        <select class="form-control" data-bavlidator="required" name="s2">
                            <option disabled="" selected="">-slect subject name-</option>
                          <?php while($s=$getSubjects2->fetch_object()){?>
                        
                          <option value="<?php echo $s->subject_id?>"><?php echo $s->subject_name?></option>
                          <?php }?>
                        </select>
                     </div>
                     <div class="col-xs-6">
                       <label>Enter Mark:</label>
                  <input type="text" name="subject2" placeholder="Enter Subject no 2 mark" class="form-control" 
                  data-bvalidator="required,number"> 
                     </div>

                   </div>


                    <div class="row">
                     <div class="col-xs-6">
                       <label>Select Subject Name 3:</label>
                       
                        <select class="form-control" data-bavlidator="required" name="s3">
                            <option disabled="" selected="">-slect subject name-</option>
                          <?php while($s=$getSubjects3->fetch_object()){?>
                        
                          <option value="<?php echo $s->subject_id?>"><?php echo $s->subject_name?></option>
                          <?php }?>
                        </select>
                     </div>
                     <div class="col-xs-6">
                       <label>Enter Mark:</label>
                  <input type="text" name="subject3" placeholder="Enter Subject no 2 mark" class="form-control" 
                  data-bvalidator="required,number"> 
                     </div>

                   </div>


                    <div class="row">
                     <div class="col-xs-6">
                        <label>Select Subject Name 4:</label>
                        <select class="form-control" data-bavlidator="required" name="s4">
                            <option disabled="" selected="">-slect subject name-</option>

                      <?php while($s=$getSubjects4->fetch_object()){?>
                        
                          <option value="<?php echo $s->subject_id?>"><?php echo $s->subject_name?></option>

                          <?php }?>
                        </select>
                     </div>
                     <div class="col-xs-6">
                       <label>Enter Mark:</label>
                  <input type="text" name="subject4" placeholder="Enter Subject no 2 mark" class="form-control" 
                  data-bvalidator="required,number"> 
                     </div>

                   </div>


                    <div class="row">
                     <div class="col-xs-6">
                      <label>Select Subject Name 5:</label>
                        <select class="form-control" data-bavlidator="required" name="s5">
                            <option disabled="" selected="">-slect subject name-</option>
                          <?php while($s=$getSubjects5->fetch_object()){?>
                        
                          <option value="<?php echo $s->subject_id?>"><?php echo $s->subject_name?></option>
                          <?php }?>
                        </select>
                     </div>
                     <div class="col-xs-6">
                       <label>Enter Mark:</label>
                  <input type="text" name="subject5" placeholder="Enter Subject no 2 mark" class="form-control" 
                  data-bvalidator="required,number"> 
                     </div>

                   </div>

                    <div class="row">
                     <div class="col-xs-6">
                        <label>Select Subject Name 6:</label>
                        <select class="form-control" data-bavlidator="required" name="s6">
                          <option disabled="" selected="">-slect subject name-</option>
                     <?php while($s6=$getSubject6->fetch_object()){?>
                        
                          <option value="<?php echo $s6->subject_id?>"><?php echo $s6->subject_name?></option>
                          <?php }?>
                        </select>
                     </div>
                     <div class="col-xs-6">
                       <label>Enter Mark:</label>
                  <input type="text" name="subject6" placeholder="Enter Subject no 2 mark" class="form-control" 
                  data-bvalidator="required,number"> 
                     </div>

                   </div>

                  <input type="submit" name="add" value="Add" class="btn btn-info">
                </form>
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
<script type="text/javascript">
  $("#DataEnteryForm").bValidator();
</script>