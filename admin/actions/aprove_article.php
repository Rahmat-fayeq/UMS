<?php
include'database.php';
if(isset($_GET['aid']))
{
	$aid=$_GET['aid'];
	$check=$connect->query("SELECT Article_status FROM articles WHERE Article_id=$aid");
	$r=$check->fetch_object();
	if($r->Article_status=='aproved')
	{
	$aproveArticle=$connect->query("UPDATE articles SET Article_status='notaproved' WHERE Article_id=$aid");
	header('location:../articles.php');
    }
    else
    {
      $aproveArticle=$connect->query("UPDATE articles SET Article_status='aproved' WHERE Article_id=$aid");
	header('location:../articles.php');
    }
}
else
{
	echo "Something is wrong ! plaese Try againg";
}
?>