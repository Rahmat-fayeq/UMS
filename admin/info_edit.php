<?php
include('control.php');

  if(!$_SESSION['email'])
    {
        header('location:login.php');
    }

include('top_header.php'); 
include('left_menu.php');
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
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About us</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="info">Description</label>
                    <textarea id="info" class="form-control" cols="10" rows="10" name="info"><?php echo $f->info; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="path">Img</label>
                    <input type="file" name="path" id="path" value="<?php echo $f->img_path; ?>" />
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="info_eid" value="<?php echo $_REQUEST['info_eid']; ?>">
                <button type="submit" class="btn btn-primary" name="update_info">Update</button>
              </div>
            </form>
          </div>   
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
</div>    