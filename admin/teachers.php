<?php
include'actions/database.php';
include('top_header.php'); 
include('left_menu.php');
if(!isset($_SESSION['email']))
    {
        header('location:login.php');
    }
$getTeachers=$connect->query("SELECT *FROM teachers JOIN faculties ON teachers.Faculty_id=faculties.Faculty_id");
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
        <li><a href="#">Manage Teachers</a></li>
     
      </ol>
    </section>

        <section class="content">

      <div class="row">
        <div class="col-xs-12">      
          <!-- /.box-header -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage articles</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="box-body" style="overflow-x: scroll;">  
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Email ID</th>
                  <th>Address</th>
                  <th>Contact Number</th>
                  <th>Faculty</th>
                  <th>Status</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php while($r=$getTeachers->fetch_object()){?>
                <tr>
                  <td><?php echo $r->Teacher_id;?></td>
                  <td><?php echo $r->First_name.' '.$r->Last_name;?></td>
                  <td><?php echo $r->User_name;?></td>
                  <td><?php echo $r->Address;?></td>
                  <td><?php echo $r->Phone;?></td>
                  <td><?php echo $r->Faculty_name;?></td>
                  <td><a href="actions/teacher_status.php?tid=<?php echo $r->Teacher_id;?>" onclick="return confirm('Are You Sure! You Want to Block?')"><button type="submit" class="btn btn-primary"><?php echo $r->status?></button></a></td>

                  <td>
                    <a href="actions/teacher_delete.php?tid=<?php echo $r->Teacher_id;?>" onclick="return confirm('Are You Sure?')"><button type="submit" class="btn btn-danger">Delete</button>
                    </a>
                  </td>
                </tr>
                <?php }?>
                </tbody>
                <tfoot>
               <tr>
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Email ID</th>
                  <th>Address</th>
                  <th>Contact Number</th>
                  <th>Faculty</th>
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