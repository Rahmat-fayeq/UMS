<?php
include 'actions/database.php';
if(!isset($_SESSION['student_id']))
{
    header('location:login.php');

}
// get exam
$getExam=$connect->query("SELECT *FROM exams");

// search


?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Result</title>
   
		<style type="text/css">

		  .result
		  {
		  	margin: 0 auto;
		  }
			.result span
			{
				padding: 5px;
				font-size: 16px;
			}
			.result .details
			{
			   padding:10px 0 5px 300px;
			}
			.result .details h3
			{
			   padding: 2px 0 5px 200px;
			}
			.result table
			{
				margin: 0 0 0 250px;
				width: 600px;
				height: auto;
			}

		</style>
	
	  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="js/jquery-1.11.1.min.js"></script>
</head>
 <body style="background: #eee;">
	<h2 align="center">UNIVERSITY MANAGEMENT SYSTEM ONLINE RESULT</h2>
	<hr style="width: 98%;">
		<div class="container">
		
			<center>
				<form method="post" action="view_result.php">
				<table class="table" style="width:400px" border="0" >
					<tr>
						<td width="145px" style="padding-right:0"><label style="margin:5px 0 0 4px">Select Exam Name:</label></td>
						<td>
						  <select class="form-control" name="exam_name" required="">
							<option disabled selected>-Select-</option>
							<?php while($r=$getExam->fetch_object()){?>
						<option value="<?php echo $r->exam_id?>"><?php echo $r->exam_name?></option>
							
								<?php }?>
						  </select>
						</td>
					</tr>
					<tr>
						<td width="145px" style="padding-right:0">
							<label style="margin:5px 0 0 8px">Enter your set NO:</label>
						</td>
						<td><input type="text" name="setNo" class="form-control" required=""></td>
						<td>
							<input type="submit" name="search" value="Search" class="btn btn-info">
						</td>
					</tr>
				</table>
				</form>
			</center>

			<div class="clearfix"></div>
			
		</div>
 </body>
</html>
