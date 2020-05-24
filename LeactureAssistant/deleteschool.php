<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php
	
	$id =isset($_GET['schoolid'])?$_GET['schoolid']:'';

	$psql ="DELETE FROM `school` WHERE schoolid='$id'";
	$result = mysql_query($psql);

	header('Location: viewschools.php');
	exit; 

?>