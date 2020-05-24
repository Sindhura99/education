<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php
	
	$testid =isset($_GET['testid'])?$_GET['testid']:'';

	$psql ="DELETE FROM `test` WHERE testid='$testid'";
	$result = mysql_query($psql);

	header('Location: viewtest.php');
	exit; 

?>