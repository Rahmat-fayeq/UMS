<?php
include'actions/database.php';
include('top_header.php'); 
include('left_menu.php');
if(!isset($_SESSION['email']))
    {
        header('location:login.php');
    }

$getResults=$connect->query("SELECT *FROM results JOIN department ON results.department_id=department.Department_id JOIN exams ON results.exam_id=exams.exam_id");
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
              <h3 class="box-title">Manage Result</h3>
            </div>
            <!-- /.box-header -->
           

            <div class="box-body">
            <div class="box-body" style="overflow-x: scroll;">  
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SetNo</th>
                  <th>Name</th>
                  <th>Dep</th>
                  <th>S1</th>
                  <th>S2</th>
                  <th>S3</th>
                  <th>S4</th>
                  <th>S5</th>
                  <th>S6</th>
                  <th>AVG</th>
                  <th>GR</th>
                  <th>Result</th>
                  <th>Delete</th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                  <?php while($r=$getResults->fetch_object()){?>
                  <tr>
                    <td><?php echo $r->student_setno?></td>
                  <td><?php echo $r->student_name?></td>
                  <td><?php echo $r->Department_name?></td>
                  <td><?php echo $r->subject1?></td>
                  <td><?php echo $r->subject2?></td>
                  <td><?php echo $r->subject3 ?></td>
                  <td><?php echo $r->subject4 ?></td>
                  <td><?php echo $r->subject5 ?></td>
                  <td><?php echo $r->subject6 ?></td>
                  <td><?php echo $r->average.'%'; ?></td>
                  <td><?php echo $r->grade ?></td>
                  <td><?php echo $r->result ?></td>
                  <td><a href="actions/delete_result.php?rid=<?php echo $r->result_id?>" onclick="return confirm('Are you Sure?')"><button type="submit" class="btn btn-danger">Delete</button></a></td>
                   <td><a href=""><button type="submit" class="btn btn-primary">Edit</button></a></td>
                  </tr>
                  <?php }?>
                </tbody>
             
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