<?php
session_start();
if(!isset($_SESSION['email']))
    {
        header('location:login.php');
    }

	require_once('top_header.php');
	require_once('left_menu.php');
?>
<style type="text/css">
	.content-wrapper h1
	{
		padding:10px 0 0 20px;
		margin: 0;
	}
</style>
<div class="content-wrapper">

	<h1>Welcome to UMS</h1>
	
</div>

<?php
	require_once('footer.php');
?>