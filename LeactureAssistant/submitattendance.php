<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php
	
	$date= $_GET['date'];

	foreach($_GET as $key => $value)
	{
		if($key=="date" || $key=="submit")
		{
			
		}
		else
		{
			$result = mysql_query("select count(*) as cnt FROM attendance where adate='$date' and sid='$key'");
			$row = mysql_fetch_array($result);
			$cnt=$row["cnt"];

			if($cnt==1)
			{
				$usql ="update attendance set status='$value' where adate='$date' and sid='$key'";
				$result = mysql_query($usql);
			}
			else
			{
				$usql ="INSERT INTO `attendance`(adate,sid,status) VALUES ('$date','$key','$value')";
				$result = mysql_query($usql);
			}
		}
	}

	header('Location: addattendance.php');
	exit;
?>