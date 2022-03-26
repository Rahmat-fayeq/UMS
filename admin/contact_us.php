<?php  

include'actions/database.php';
if(!isset($_SESSION['email']))
    {
        header('location:login.php');
    }

include('top_header.php'); 
include('left_menu.php');
// get all contact messege
$getContact=$connect->query("SELECT *FROM contact_us");
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contact us
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">contact us</a></li>

      </ol>
    </section>

        <section class="content">

      <div class="row">
        <div class="col-xs-12">      
          <!-- /.box-header -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Contact</h3>
            </div>
            <!-- /.box-header -->
           

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Date</th>
                  <th>Delete</th>
                  <th>Reply</th>
                </tr>
                </thead>
                <tbody>
                <?php while($r=$getContact->fetch_object()){?>
                     <tr>
                       <td><?php echo $r->contact_id?></td>
                       <td><?php echo $r->contact_name?></td>
                       <td><?php echo $r->contact_email?></td>
                       <td><?php echo $r->subject?></td>
                       <td><?php echo $r->contact_massege?></td>
                       <td><?php echo $r->contact_date?></td>
                       <td><a href="actions/delete_contact.php?cid=<?php echo $r->contact_id?>"><button class="btn btn-danger">Delete</button></a></td>
                       <td><a href=""><button class="btn btn-info">Reply</button></a></td>
                     </tr>
                <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Date</th>
                  <th>Delete</th>
                  <th>Reply</th>
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