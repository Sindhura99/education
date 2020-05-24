<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>
<?php require_once('includes/Pagination.class.php');

$sql ="SELECT * FROM  admin_documents ";
$result = mysql_query($sql);

?>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				
				<?php
					if($user_type==1)
					{
				?>
						<div class="panel-heading">
							<center>  <a href="uploaddocuments.php"> <font color="white"> Upload Documents </font> </a>  </center>
						</div>
				<?php
					}
				?>

				<!-- /.panel-heading -->
				<div class="panel-body">

					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover"
							id="dataTables-example">
							<thead>
								<tr>

									<td width="10%">ID</td>
									<td width="10%">Title</td>
									<td width="10%">Description</td>
									<?php 
										
										if($user_type==1)
										{
									?>
											<td width="10%">Delete</td>
									<?php
										}
									?>
									<td width="10%">Download</td>
								</tr>
							</thead>
							<tbody>

							<?php 
								while($row = mysql_fetch_assoc($result)) 
								{
							?>

								<tr>
									<td><?php echo $row ['adid']; ?></td>
									<td><?php echo $row ['title']; ?></td>
									<td><?php echo $row ['description']; ?></td>

									<?php 
										
										if($user_type==1)
										{
									?>
											<td><a
										href="deletedocuments.php?id=<?php echo $row ['adid']; ?>" />Delete
										</a></td>

									<?php
										}
									?>

									
									<td><a href="./documents/<?php echo $row ['filename']; ?>" target="_blank" download >Download</a></td>
								</tr>
								<?php
							}
							
							?>
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
	</div>

</div>

</div>

</div>
</div>




								<?php include('includes/footer.php'); ?>


