<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				
				<div class="panel-heading">
					<center><strong>Score</strong></center>
				</div>

				<!-- /.panel-heading -->
				<div class="panel-body">
				
					<?php 
						
						$testid =isset($_GET['testid'])?$_GET['testid']:'';
						$username=$_SESSION['username'];

						if($testid!=null && $username!=null)
						{
							$sql3 ="SELECT * FROM test_score where stid='$username' and testid='$testid'";
							$result3 = mysql_query($sql3);
						
					?>

					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover"
							id="dataTables-example">
							<thead>
								<tr>
									<td width="10%">Subject</td>
									<td width="10%">Score</td>
								</tr>
							</thead>
							<tbody>

							<?php 

								while($row3 = mysql_fetch_assoc($result3))  { ?>

								<tr>
									<td><?php echo $row3 ['subject']; ?></td>
									<td><?php echo $row3 ['score']; ?></td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
					
					<?php 
						}	
					?>
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