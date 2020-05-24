<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php
	
	$id =isset($_GET['subjectid'])?$_GET['subjectid']:'';

	$psql ="DELETE FROM `subjects` WHERE subjectid='$id'";
	$result = mysql_query($psql);
	
	header('Location: viewsubjects.php');
	exit; 

?>