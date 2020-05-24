<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php
	
	$testid= $_GET['testid'];
	$subject= $_GET['subject'];

	foreach($_GET as $key => $value)
	{
		if($key=="testid" || $key=="submit" || $key=="subject")
		{
			
		}
		else
		{
			$result = mysql_query("select count(*) as cnt FROM test_score where testid='$testid' and stid='$key' and subject='$subject'");

			$row = mysql_fetch_array($result);
			$cnt=$row["cnt"];

			if($cnt==1)
			{
				$usql ="update test_score set score='$value' where testid='$testid' and stid='$key' and subject='$subject'";
				$result = mysql_query($usql);
			}
			else
			{
				$usql ="INSERT INTO `test_score`(testid,stid,subject,score) VALUES ('$testid','$key','$subject','$value')";
				$result = mysql_query($usql);
			}
		}
	}

	header('Location: viewtest.php');
	exit;
?>