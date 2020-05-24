<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php

if(isset($_POST['submit'])){
	
	$name= $_POST['name'];
	$description= $_POST['description'];
	
	$usql ="INSERT INTO `test`(name,description) VALUES ('$name','$description')";
	
	$result = mysql_query($usql);

	$smsg = "Test Added Successfully";
}

?>
<!-- start account -->
<div class="login-page">
	<div class="dreamcrub">
		<div class="account_grid">
			<div class="col-md-6 login-right">
				<h3>Create New Test</h3>
				<form method="post" class="form form-vertical" id="test-form"
					method="post" onSubmit="loadVal();">

					<span style="color: red;"> <?php echo isset($emsg)?$emsg:'';?> </span>

					<span style="color: green;"> <?php echo isset($smsg)?$smsg:'';?> </span>
					
					<div>
						<span>Test Name</span> <input type="text" name="name"
							id="name" required
							<?php echo isset($_POST['name'])?$_POST['name']:'';?>>
					</div>

					<div>
						<span>Description</span> <input type="text" name="description"
							id="description" required
							<?php echo isset($_POST['description'])?$_POST['description']:'';?>>
					</div>
					<input type="submit" name="submit" value="Add Test">
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
</div>
</div>
</div>
							<?php include('includes/footer.php'); ?>
