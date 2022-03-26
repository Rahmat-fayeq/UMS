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
  $subject=$_POST['subject'];
  $addsubject=$connect->query("INSERT INTO subjects(subject_name) VALUES('$subject')");
  if($addsubject)
  {
    echo "<script>alert('subject Successfuly added');</script>";
  }
}

// get all exam 
$getSubject=$connect->query("SELECT *FROM subjects");
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
              <h3 class="box-title">Manage subjects</h3>
            </div>
            <!-- /.box-header -->
           

            <div class="box-body">
              <div class="row col-xs-6">
                <form method="post">
                  <input type="text" name="subject" placeholder="Enter Exam Name" class="form-control" required=""><br>
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
                  <?php while($r=$getSubject->fetch_object()){?>
                  <tr>
                    <td><?php echo $r->subject_id?></td>
                    <td><?php echo $r->subject_name?></td>
                    <td><a href="actions/delete_subject.php?sid=<?php echo $r->subject_id?>" onclick="return confirm('Are You sure')"><button class="btn btn-danger">Delete</button></a></td>
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