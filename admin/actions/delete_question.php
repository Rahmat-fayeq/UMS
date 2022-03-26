<?php
include'database.php';
if(isset($_GET['qid']))
{
	$qid=$_GET['qid'];
	$removeQuestion=$connect->query("DELETE FROM questions WHERE Question_id=$qid");
	header('location:../questions.php');
}
else
{
	echo "Something is wrong ! plaese Try againg";
}


?>