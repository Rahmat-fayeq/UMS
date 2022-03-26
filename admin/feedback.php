<?php 
include'actions/database.php';
if(!isset($_SESSION['email']))
    {
        header('location:login.php');
    }
 
include('top_header.php'); 
include('left_menu.php');

$getFeedback=$connect->query("SELECT *FROM feedback_tb");
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     Feedback
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Feedback</a></li>

      </ol>
    </section>

        <section class="content">

      <div class="row">
        <div class="col-xs-12">      
          <!-- /.box-header -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Feedbacks</h3>
            </div>
            <!-- /.box-header -->
           

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Rate</th>
                  <th>Date</th>
                  <th>Delete</th>
           
                </tr>
                </thead>
                <tbody>
                  <?php while($r=$getFeedback->fetch_object()){?>
                  <tr>
                    <td><?php echo $r->feedback_id?></td>
                    <td><?php echo $r->Name?></td>
                    <td><?php echo $r->User_name?></td>
                    <td><?php echo $r->massege?></td>
                    <td><?php echo $r->rate?></td>
                    <td><?php echo $r->feedback_date?></td>
                    <td><a href="actions/delete_feedback.php?fid=<?php echo $r->feedback_id?>"><button class="btn btn-danger">Delete</button></a></td>
                  
                  </tr>
                  <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Rate</th>
                  <th>Date</th>
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