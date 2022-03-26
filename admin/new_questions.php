<?php
include'actions/database.php';
include('top_header.php'); 
include('left_menu.php');
if(!isset($_SESSION['email']))
    {
        header('location:login.php');
    }
$getQuestion=$connect->query("SELECT *FROM questions JOIN students ON questions.Student_id=students.Student_id where questions.question_status='noaprove'");
?>

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Students</a></li>
     
      </ol>
    </section>

        <section class="content">

      <div class="row">
        <div class="col-xs-12">      
          <!-- /.box-header -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">New Questions</h3>
            </div>
            <!-- /.box-header -->
           

            <div class="box-body">
            <div class="box-body" style="overflow-x: scroll;">  
              <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                  <th>ID</th>
                  <th>Student Name</th>
                  <th>Question</th>
                  <th>Upload Date</th>
                  <th>Status</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
               <?php while($r=$getQuestion->fetch_object()){

                ?>
               <tr>

                 <td><?php echo $r->Question_id;?></td>
                 <td><?php echo $r->First_name.''.$r->Last_name;?></td>
                 <td><?php echo $r->Question;?></td>
                 <td><?php echo $r->question_date;?></td>
                 <td>
                  <a href="actions/approve_question.php?qid=<?php echo $r->Question_id;?>">
                    <button class="btn btn-primary"><?php echo $r->question_status;?></button>
                 </a>
               </td>
                 
              <td>
                  <a href="actions/delete_question.php?qid=<?php echo $r->Question_id;?>" onclick="return confirm('Are You Sure?')">
                    <button class="btn btn-danger">Delete</button>
                  </a>
                </td>
               </tr>
                <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Student Name</th>
                  <th>Question</th>
                  <th>Answers</th>
                  <th>Upload Date</th>
                  <th>Status</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
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