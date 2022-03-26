<?php 
include'actions/database.php';
if(!isset($_SESSION['email']))
    {
        header('location:login.php');
    }
 
include('top_header.php'); 
include('left_menu.php');
// add new exam
if(isset($_POST['add']))
{
  $examname=$_POST['examname'];
  $addexam=$connect->query("INSERT INTO exams(exam_name) VALUES('$examname')");
  if($addexam)
  {
    echo "<script>alert('Exam Successfuly added');</script>";
  }
}

// get all exam 
$getExam=$connect->query("SELECT *FROM exams");
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
              <div class="row col-xs-6">
                <form method="post">
                  <input type="text" name="examname" placeholder="Enter Exam Name" class="form-control" required=""><br>
                  <input type="submit" name="add" value="Add" class="btn btn-info">
                </form>
              </div>
              <div class="clearfix"></div><br><br><br>
              <hr>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  <?php while($r=$getExam->fetch_object()){?>
                  <tr>
                    <td><?php echo $r->exam_id?></td>
                    <td><?php echo $r->exam_name?></td>
                    <td><a href="actions/delete_exam.php?eid=<?php echo $r->exam_id?>" onclick="return confirm('Are You sure')"><button class="btn btn-danger">Delete</button></a></td>
                  </tr>

                  <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Delete</th>
                
                </tr>
                </tfoot>
              </table>
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