<?php
include'actions/database.php';
if(!isset($_SESSION['email']))
    {
        header('location:login.php');
    }

include('top_header.php'); 
include('left_menu.php');
$getArticles=$connect->query("SELECT *FROM articles JOIN teachers ON articles.Teacher_id=teachers.Teacher_id where articles.Article_status='notaproved'");
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
        <li><a href="#">Manage articles</a></li>
     
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
                  <th>Author</th>
                  <th>Title</th>
                  <th>Containt</th>
                  <th>Teacher</th>
                  <th>Status</th>
                  <th>Read</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  <?php while($r=$getArticles->fetch_object()){?>
                      <tr>
                        <td><?php echo $r->Article_id?></td>
                        <td><?php echo $r->Author_name?></td>
                        <td><?php echo $r->Article_title?></td>
                        <td><?php echo substr($r->Article_body,0,250).'...'?></td>
                        <td><?php echo $r->First_name.' '.$r->Last_name?></td>
                        <td><a href="actions/aprove_article.php?aid=<?php echo $r->Article_id?>"><button class="btn btn-default"><?php echo $r->Article_status?></button></a></td>
                        <td><a href="read_artilce.php?aid=<?php echo $r->Article_id?>"><button class="btn btn-info">Read</button></a></td>
                        <td><a href="actions/delete_article.php?aid=<?php echo $r->Article_id?>" onclick="return confirm('Are You Sure?')"><button class="btn btn-danger">Delete</button></a></td>

                      </tr>
                  <?php }?>
                </tbody>
                <tfoot>
                 <tr>
                  <th>ID</th>
                  <th>Author</th>
                  <th>Title</th>
                  <th>Containt</th>
                  <th>Teacher</th>
                  <th>Status</th>
                  <th>Read</th>
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