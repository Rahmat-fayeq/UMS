<!-- gallery -->
<?php 
 $getGallery=$connect->query("SELECT *FROM gallery ORDER BY id DESC LIMIT 10");
?>
<div class="gallery" id="gallery">
<div class="container">
<div class="head-top-w3ls"><i class="fa fa-graduation-cap" aria-hidden="true"></i></div>
			<h5 class="title-w3">gallery</h5>
			<ul id="flexiselDemo1">		
			  <?php while($img=$getGallery->fetch_object()){?>	
				<li>
					<div class="wthree_testimonials_grid_main">
						
				<img src="../admin/<?php echo $img->image?>" alt=" " class="img-responsive" style="height: 300px"/>
								<h6><?php echo $img->title ?></h6>
					</div>
				</li>
				<?php }?>
				


			</ul>
			
</div>
</div>