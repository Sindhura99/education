<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php
	
	$id =isset($_GET['username'])?$_GET['username']:'';

	$psql ="DELETE FROM `faculty` WHERE facultyid='$id'";
	$result = mysql_query($psql);

	$psql ="DELETE FROM `login` WHERE username='$id'";
	$result = mysql_query($psql);
	
	header('Location: viewfaculty.php');
	exit; 

?>