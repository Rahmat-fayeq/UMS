<?php
include'actions/database.php';
if(!isset($_SESSION['email']))
    {
        header('location:login.php');
    }

include('top_header.php'); 
include('left_menu.php');
$getNews=$connect->query("SELECT *FROM news");
?>

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       News 
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage News</a></li>
     
      </ol>
    </section>

        <section class="content">

      <div class="row">
        <div class="col-xs-12">      
          <!-- /.box-header -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage News</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="box-body" style="overflow-x: scroll;">  
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Containt</th>
                  <th>Image</th>
                  <th>Post Date</th>
                  <th>No Of Comments</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  <?php while($r=$getNews->fetch_object()){?>
                      <tr>
                        <td><?php echo $r->id?></td>
                        <td><?php echo $r->title?></td>
                      <td><?php echo substr($r->body,0,250).'...'?></td>

                        <td><img src="<?php echo $r->image?>" width="200px" heigth="200px"></td>
                        <td><?php echo $r->post_date?></td>
                        <td>0</td>
                        <td><a href="editNews.php?nid=<?php echo $r->id?>"><button class="btn btn-info">Edit</button></a></td>
                        <td><a href="actions/delete_news.php?nid=<?php echo $r->id?>" onclick="return confirm('Are You Sure?')"><button class="btn btn-danger">Delete</button></a></td>

                      </tr>
                  <?php }?>
                </tbody>
                <tfoot>
                 <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Containt</th>
                  <th>Image</th>
                  <th>Post Date</th>
                  <th>No Of Comments</th>
                  <th>Edit</th>
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