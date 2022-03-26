<?php
include'database.php';
if(isset($_GET['qid']))
{
	$qid=$_GET['qid'];
	$check=$connect->query("SELECT question_status FROM questions WHERE Question_id=$qid");
	$r=$check->fetch_object();
	if($r->question_status=='noaprove')
	{
	$aproveQuestion=$connect->query("UPDATE questions SET question_status='aproved' WHERE Question_id=$qid");
	header('location:../questions.php');
    }
    else
    {
     $aproveQuestion=$connect->query("UPDATE questions SET question_status='noaprove' WHERE Question_id=$qid");
	  header('location:../questions.php');
    }
}
else
{
	echo "Something is wrong ! plaese Try againg";
}
?>