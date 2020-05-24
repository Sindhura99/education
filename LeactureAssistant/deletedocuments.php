<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php
	
	$id =isset($_GET['id'])?$_GET['id']:'';

	$psql ="DELETE FROM `admin_documents` WHERE adid='$id'";
	$result = mysql_query($psql);

	header('Location: viewdocuments.php');
	exit; 

?>