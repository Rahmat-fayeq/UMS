<?php
include 'assist/header.php';
include 'actions/database.php';
error_reporting(0);
$msg="";
if(!isset($_SESSION['student_id']))
{
   if(isset($_SESSION['faculty_id']))
   {
     include 'assist/faculty_header.php';
   }
   else
   {
   header('location:index.php');
   }
}
if(isset($_SESSION['student_id']))
{
  header('location:index.php');
}


// get article for editting
$id=$_SESSION['faculty_id'];
if(isset($_GET['aid']))
{
  $aid=$_GET['aid'];

$getArticle=$connect->query(" 
  SELECT *FROM articles WHERE Article_id=$aid AND Teacher_id=$id");
$r=$getArticle->fetch_object();
}
else
{
  
  header("location:profiles_f.php?id=$id");
}

// update articles
if(isset($_POST['edit']))
{
  $author_name=$connect->real_escape_string($_POST['author_name']);
  $title=$connect->real_escape_string($_POST['title']);
  $article=$connect->real_escape_string($_POST['article']);
  $tid=$_SESSION['faculty_id'];
  $addArticle="UPDATE articles SET Author_name='$author_name',Article_title='$title',Article_body=' $article' WHERE Article_id=$aid AND Teacher_id=$id";
  $query=$connect->query($addArticle);
  if($query)
  {
    echo " <script> alert('Updation Done Successfuly');</script>";
    header("location:profiles_f.php?id=$id");
  }

  else
  {
    $msg="Sorry! Try Again!";
  }
}
?>

  <div class="aupload_article">
  		<div class="container">
  			  <div class="row">
  			  	 <div class="col-md-6 col-md-offset-3">
              <h4 class="text-info" style="padding:5px"><?php echo $msg?></h4>
  			  	 	<div class="panel panel-default">
       <div class="panel-heading">Share Your Article With Us!</div>
             <div class="panel-body">	 	
  			  	 	 	<form method="post" id="addArticle">
  			  	 	 		 <label>Enther the Author Name:</label>
  			  	 	 		 <input type="text" name="author_name" class="form-control" data-bvalidator="required,alpha" 
                   value="<?php echo $r->Author_name?>">
  			  	 	 		 <label>Enther The Title:</label>
  			  	 	 		 <input type="text" name="title" class="form-control"
                   data-bvalidator="required" value="<?php echo $r->Article_title?>">
  			  	 	 		 <label>Write Your Article:</label>
  			  	 	 		 <textarea class="form-control" rows="20"  style="resize: none; background-color: #dfe4ea" placeholder="Share Your Idea !" name="article" data-bvalidator="required"><?php echo $r->Article_body;?></textarea>
  			  	 	 		 <input type="submit" name="edit" value="Edit" class="btn btn-info form-control" >
  			  	 	 	</form>
  			  	 	</div>
  			  	 	</div>
  			  	 </div>
  			  </div>
  		</div>

  </div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#addArticle').bValidator();
  });
</script>
<?php  

include 'assist/footer.php';
?>