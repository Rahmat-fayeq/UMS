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
<h2>Contact Us</h2>
	</div>
<!-- //banner -->
<!-- contact -->
	<div class="contact-agile">
		<div class="faq">
			
			<div class="container">
				<div class="col-md-3 location-agileinfo">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
					</div>
					<h3>Address</h3>
					<h4>Barchi</h4>
					<h4>Kabul,</h4>
					<h4>Afghanistan</h4>
				</div>
				<div class="col-md-3 call-agileits">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
					</div>
					<h3>Call</h3>
					<h4>+18044126235</h4>
					<h4>+14056489808</h4>
					<h4>+16789339049</h4>
				</div>
				<div class="col-md-3 mail-wthree">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
					</div>
					<h3>Email</h3>
					<h4><a href="mailto:info@example.com">university@mail.com</a></h4>
					<h4><a href="mailto:info@example.com">ums@mail.com</a></h4>
				</div>
				<div class="col-md-3 social-w3l">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					</div>
					<h3>Social media</h3>
					<ul>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i><span class="text">Facebook</span></a></li>
						<li class="twt"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span class="text">Twitter</span></a></li>
						<li class="ggp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i><span class="text">Google+</span></a></li>	
					</ul>
				</div>
				<div class="clearfix"></div>
				<form  method="post" id="contact_form">
					<input type="text" name="fname" placeholder="FIRST NAME" id="fname"  style="margin-right:0">

					<input type="text" name="lname" id="lname" placeholder="LAST NAME" >

					<input type="text" name="email" placeholder="EMAIL" id="email">

					<input type="text" name="subject" placeholder="SUBJECT"  id="subject">

					<textarea  name="message" placeholder="YOUR MESSAGE"  id="message"></textarea>

					<input type="submit" name="submit" id="submit" value="SEND MESSAGE">
				</form>
					<h4 id="error" class="text-danger"></h4>
			</div>
		</div>
	</div>
	<div class="map-w3-agileits">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6147597.273763374!2d8.084369138346274!3d41.20528240044405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d4fe82448dd203%3A0xe22cf55c24635e6f!2sItaly!5e0!3m2!1sen!2sin!4v1476877496594"></iframe>
	</div>
<!-- //contact -->
<?php include 'assist/footer.php'; ?>

<script type="text/javascript">
	$(document).ready(function(){
	

		$(document).on("click",'#submit',function(event)
		{
			
			  event.preventDefault();
			var fname=$.trim($("#fname").val());
			var lname=$.trim($("#lname").val());
			var email=$.trim($("#email").val());
			var subject=$.trim($("#subject").val());
			var message=$.trim($("#message").val());
		
			var emailValid=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if(fname!="" && lname!="" && email!="" && subject!="" && message!="")
			{
				if(email.match(emailValid))
				{
					$.ajax({
						url:"actions/contact.php",
						method:"POST",
						data:$("#contact_form").serialize(),
						success:function(data)
						{
							$("#contact_form")[0].reset();
							$("#error").html("Thanks For Your Contact");
						}
					});

				}	
				else
				{
				 $("#error").html("Invalid Email ..!");
				}	
			}	
			else
			{
				$("#error").html("All Field Require ..!");
			}
		});
	});


</script>