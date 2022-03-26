<?php 
include 'assist/header2.php';
include 'actions/database.php';
if(isset($_SESSION['student_id']))
{
include 'assist/student_header.php';
}
else if(isset($_SESSION['faculty_id']))
{
	include 'assist/faculty_header.php';
}
else
{
  include 'assist/main_header.php';
}
?>
	<h2>About Us</h2>
	</div>
<!-- //banner -->
<!--about-->
<!-- //main-content -->
		<div class="wthree-main-content">
		<!-- About-page -->
			<div class="container">
			<div class="head-top-w3ls"><i class="fa fa-graduation-cap" aria-hidden="true"></i></div>
			<h5 class="title-w3">Our History</h5>
				<div class="w3-about-top">
				
				<div class="col-md-6 w3ls-about-top-right-grid">
					<div class="w3ls-about-gd">
						<div class="w3-about-gd-left">
							<h4>2000-</h4>
						</div>
						<div class="w3-about-gd-right">
							<p>UMS has started with 30 students and 3 Faculties and was gettig admission in Computer Science & Maths Departments</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3ls-about-gd">
						<div class="w3-about-gd-left">
							<h4>2004 -</h4>
						</div>
						<div class="w3-about-gd-right">
							<p>UMS Celebrating from the first graduated students, and launched the Physics Department</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3ls-about-gd">
						<div class="w3-about-gd-left">
							<h4>2008-</h4>
						</div>
						<div class="w3-about-gd-right">
							<p>UMS Celebrating from the 2th Computer Science and Maths and 1th Physics graduated students.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3ls-about-gd">
						<div class="w3-about-gd-left">
							<h4>2018 -</h4>
						</div>
						<div class="w3-about-gd-right">
							<p>Now UMS having more then 3000 Students in different department and 200 Faculties</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					
				</div>
				<div class="col-md-6 w3ls-about-top-left-grid">
					<img src="images/about.jpg" alt=" " class="img-responsive" />
					<h4>UMS students on the 4th Graduation Party</h4>
					<p></p>
				</div>
				<div class="clearfix"> </div>
			</div>
			</div>
			</div>
<!--//about-->



<?php include 'assist/footer.php'; ?>