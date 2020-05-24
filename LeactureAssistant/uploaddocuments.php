<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php  
if(isset($_POST['submit'])){

	$title= $_POST['title'];
	$description= $_POST['description'];

	$target_path = "documents/";
    $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
	$document_name=basename( $_FILES['uploadedfile']['name']);
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))

	$sql ="INSERT INTO `admin_documents`(`title`,`description`,`filename`) VALUES ('$title','$description','$document_name')";
 
	$result = mysql_query($sql);   
   
	$smsg = "Added Successfully";
 }

 ?>

<!-- start account -->
<div class="login-page">
	<div class="dreamcrub">
		<div class="account_grid">
			<div class="col-md-6 login-right">
				<h3>Upload Document</h3>
				<form method="post" class="form form-vertical" id="test-form"
					method="post" onSubmit="loadVal();" enctype="multipart/form-data">

					<span style="color: red;"> <?php echo isset($emsg)?$emsg:'';?> </span>

					<span style="color: green;"> <?php echo isset($smsg)?$smsg:'';?> </span>
					
					<div>
						<span>Title</span> <input type="text" name="title"
							id="title">
					</div>

					<div>
						<span>Description<input type="text" name="description"
							id="description">
					</div>

					<div>
						<span>Document</span>
						<input  type="file" name="uploadedfile" id="uploadedfile"  required>
					</div>

					<input type="submit" name="submit" value="Upload">

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
