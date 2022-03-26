<?php
include 'actions/database.php';
include 'assist/header.php';
//include 'assist/main_header.php';
if(isset($_SESSION['student_id']))
{
include 'assist/student_header.php';
}
if(isset($_SESSION['faculty_id']))
{
	include 'assist/faculty_header.php';
}
if(!isset($_SESSION['student_id']) && !isset($_SESSION['faculty_id']))
{
  include 'assist/main_header.php';
}



include 'assist/banner.php';
include 'service.php';
include 'assist/gallary.php';
include 'assist/footer.php';
?>