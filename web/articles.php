<?php
include 'assist/header.php';
include 'actions/database.php';
if(isset($_SESSION['student_id']))
{
include 'assist/student_header.php';
}
 if(isset($_SESSION['faculty_id']))
{
  include 'assist/faculty_header.php';
}
if(!isset($_SESSION['student_id']) &&!isset($_SESSION['faculty_id']))
{
  include 'assist/main_header.php';
}


$getArticles=$connect->query("
  SELECT * FROM articles JOIN teachers ON articles.Teacher_id=teachers.Teacher_id ORDER BY Article_id DESC");
$item_per_page=6;
$rows=$getArticles->num_rows;
$totalPage=ceil($rows/$item_per_page);//ceil(3.4)=4
if(!isset($_GET['page']))
{
  $page=1;
}
else
{
  $page=$_GET['page'];
}
 $first_page=($page-1)*$item_per_page;
 $select=" SELECT * FROM articles JOIN teachers ON articles.Teacher_id=teachers.Teacher_id LIMIT $first_page,$item_per_page";
  $getArt=$connect->query($select);
?>

<style type="text/css">
.pagenation ul{padding: 30px 0 0 250px;}
.pagenation ul li{
    display: inline-block;
    list-style: none;
    padding-left: 10px;
    width: 30px;
    border: 1px solid #95a5a6;
    border-radius: 3px;
  }
.pagenation ul li:hover{cursor: pointer;
  border:1px solid #2c3e50;}
</style>
<div class="articles" >
  <div class="container">
	<div class="row">
	 <div class="col-lg-8">
    <?php  if($getArt->num_rows>0) {
      while($r=$getArt->fetch_object()){
      ?>
	    <div class="media mb-4">
            <a href="artilce_details.php?aid=<?php echo $r->Article_id?>"><img class="img-rounded user" src="actions/images/<?php echo $r->image?>" alt="user"></a>
            <div class="media-body">
              <h3 class="mt-0"><?php echo $r->Article_title;?></h3>
              <h6>Author:<small> <?php echo $r->Author_name?></small> Date:<small><?php echo $r->uploadDate?></small> </h6>
              <p>
                <?php echo substr($r->Article_body,0,250)."..." ?>
              </p>
            <a href="artilce_details.php?aid=<?php echo $r->Article_id?>">Read More</a>
            </div>
       </div>

       <?php } } else{?>

         <div class="media mb-4">
          <h2 align="center" class="text-info">No Article Found !</h2>
         </div>
         <?php  }?>

         <div style="margin-left:225px" >
       
            
                <ul class="pagination">
                  <li class="disabled"><a class="page-link" href="#">Previous</a></li>
                   <?php for ($i=1; $i <=$totalPage ; $i++)
                       {     
                      ?>      
                  <li><a href="articles.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
                  
                  <?php }?>
                  <li class="disabled"><a class="page-link" href="#">Next </a></li>
                </ul>
          
         </div>
       
	</div>
</div>
	
</div>
</div>

<?php include 'assist/footer.php';?>