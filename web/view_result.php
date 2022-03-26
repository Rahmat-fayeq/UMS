<?php 
error_reporting(0);
include 'actions/database.php';
if(!isset($_SESSION['student_id']))
{
    header('location:login.php');

}

if(isset($_POST['search']))
{
	$exam_name=$_POST['exam_name'];
	$setNo=$_POST['setNo'];

	$check=$connect->query("SELECT *FROM results JOIN exams ON results.exam_id=exams.exam_id WHERE results.student_setno=$setNo AND results.exam_id=$exam_name");
	$count=$check->num_rows;
	if($count==0)
	{
      echo "<h2 align='center' style='color:red'>Invalid Set No</h2>";
      exit();
	}
	$row=$check->fetch_object();
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

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
</head>
<body>
    <div id="result" class="result">
				 <div class="details">
				 	  <h3>UMS</h3>
				 	  <span><b>Name:</b>&nbsp 
				 	  	<?php echo $row->student_name?> </span>
				 	  <span><b>Set No:</b>&nbsp <?php echo $row->student_setno?></span>
				 	  <span><b>Exam Name:</b>&nbsp<?php echo $row->exam_name?></span>
				 </div>
				<table class="table">
					<tr>
						<td colspan="3" align="center">SUBJECTS NAME</td>
						<td colspan="6" align="center">
						    MARKS
						</td>
						
					</tr>
					<tr>
						<td colspan="3"></td>
						<td colspan="3">Maximum</td>
						<td colspan="3">OBTAIN</td>
						
						
					</tr>
				    <tr>
				    	<td colspan="3">
				    	  <?php  $s1=$row->subject1_id;
				    	  $getsub=$connect->query("SELECT *FROM subjects WHERE subject_id=$s1");
				    	   $r=$getsub->fetch_object();
				    	   echo $r->subject_name;?></td>
				    	<td colspan="3" >100</td>
				    	<td colspan="3" ><?php echo $row->subject1?></td>
				    
				    </tr>
				    <tr>
				    	<td colspan="3">
				    	  <?php  $s1=$row->subject2_id;
				    	  $getsub=$connect->query("SELECT *FROM subjects WHERE subject_id=$s1");
				    	   $r=$getsub->fetch_object();
				    	   echo $r->subject_name;?></td>
				    	<td colspan="3" >100</td>
				    	<td colspan="3" ><?php echo $row->subject2?></td>
				    
				    </tr>
				    <tr>
				    	<td colspan="3">
				    	  <?php  $s1=$row->subject3_id;
				    	  $getsub=$connect->query("SELECT *FROM subjects WHERE subject_id=$s1");
				    	   $r=$getsub->fetch_object();
				    	   echo $r->subject_name;?></td>
				    	<td colspan="3" >100</td>
				    	<td colspan="3" ><?php echo $row->subject3?></td>
				    
				    </tr>
				    <tr>
				    	<td colspan="3" >
				    	  <?php  $s1=$row->subject4_id;
				    	  $getsub=$connect->query("SELECT *FROM subjects WHERE subject_id=$s1");
				    	   $r=$getsub->fetch_object();
				    	   echo $r->subject_name;?></td>
				    	<td colspan="3" >100</td>
				    	<td colspan="3" ><?php echo $row->subject4?></td>
				    
				    </tr>
				    <tr>
				    	<td colspan="3" >
				    	  <?php  $s1=$row->subject5_id;
				    	  $getsub=$connect->query("SELECT *FROM subjects WHERE subject_id=$s1");
				    	   $r=$getsub->fetch_object();
				    	   echo $r->subject_name;?></td>
				    	<td colspan="3" >100</td>
				    	<td colspan="3" ><?php echo $row->subject5?></td>
				    
				    </tr>
				    <tr>
				    	<td colspan="3" >
				    	  <?php  $s1=$row->subject6_id;
				    	  $getsub=$connect->query("SELECT *FROM subjects WHERE subject_id=$s1");
				    	   $r=$getsub->fetch_object();
				    	   echo $r->subject_name;?></td>
				    	<td colspan="3" >100</td>
				    	<td colspan="3" ><?php echo $row->subject6?></td>
				    
				    </tr>
				        <tr>
				    	<td colspan="3" ><b>Total</b></td>
				    	<td colspan="3" >400</td>
				    	<td colspan="3" >
				    		<?php echo $row->subject6+$row->subject5+$row->subject4+$row->subject3+$row->subject2+$row->subject1?></td>
				    
				    </tr> 
				</table>
				<div class="details">
				 	  <span><b>Average:</b>&nbsp <?php echo $row->average?> </span>
				 	  <span><b>Grade:</b>&nbsp <?php echo $row->grade?> </span>
				 	  <span><b>Result:</b>&nbsp <?php echo $row->result?> </span>
				 </div>
			</div>
</body>
</html>