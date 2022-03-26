	<!-- header -->
		<header>
			<div class="container">

			<!-- navigation -->
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>				  
				<div class="w3-logo">
					<h1><a href="index.php">UMS</a></h1>
				</div>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
					<li>
					<a class="active" href="index.php">Home</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="articles.php">Research</a></li>
					<li><a href="gallery.php">Gallery</a></li>
					<li class="dropdown">
					  <a href="#" class="dropbtn">Student</a>
					  <ul class="dropdown-content">
						<li><a href="profiles.php?id=<?php echo $_SESSION['student_id'];?>">My Profile</a></li>
						<li><a href="online_result.php">Online Result</a></li>
						<li><a href="question.php">Ask Questions</a></li>
						<li><a href="download.php">Donwload</a></li>

					  </ul>
					</li>	
					
					<li><a href="contact.php">Contact Us</a></li>
					<li><a href="feedback.php">Feedback</a></li>
					<li><a href="aboutus.php">About Us</a></li>
					<li><a href="actions/SignOut.php">SignOut</a></li>
				  </ul>
				</div><!-- /.navbar-collapse -->
				 
			</nav>
			<div class="clearfix"></div>
		<!-- //navigation -->
			</div>
		</header>
		