<?php
include 'assist/header.php';
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

$getGallery=$connect->query("SELECT *FROM gallery");
?>
<style type="text/css">
    .gallery
    {
    	padding-top: 30px;
    	margin-top: 0px;
    	background-color: #ffffff;
    }
    .gallery .title
    {
    	margin-left: 500px;
    	padding:10px 0 10px 0;
    	
    }
   .gallery-info
   {
   	width: 80%;
   	height: auto;
   	margin:0px auto;
   }
	.thumbnail{
		width: 30%;
		height: 250px;
		float: left;
		padding: 20px;
		box-sizing: border-box;
	}
	.thumbnail img
	{
		width: 100%;
		height: auto;
	}
	.thumbnail p
	{
		padding: 10px 0 0 0;
		font-size: 14px;
		font-style: italic;
	}
</style>

<!--gallery-->
	<div class="gallery">
		<div class="title"><h2>Our Galley</h2></div>
		<div class="container">
			<div class="gallery-info">
              	<?php while($img=$getGallery->fetch_object()){?>
              	  <div class="thumbnail">
		             <a href="../admin/<?php echo $img->image?>" data-fancybox="images" data-caption="<?php echo $img->title?>">
			          <img src="../admin/<?php echo $img->image?>" alt="" />
		             </a>
		             <p><?php echo $img->title?></p>
		              </div>
                  <?php }?>	
            
			</div>	
		</div>
	</div>
	<!--//gallery-->
	<?php include 'assist/footer.php';?>