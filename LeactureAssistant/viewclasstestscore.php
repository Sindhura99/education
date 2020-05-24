<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>
<?php 
$testid =isset($_GET['testid'])?$_GET['testid']:'';
?>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<center><strong>Score</strong></center>
				</div>

				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<form action="viewclasstestscore.php">
							<input type="hidden" value="<?php echo $testid; ?>" name="testid">
							<table class="table table-striped table-bordered table-hover"
								id="dataTables-example">
								
								<thead>
									<tr>
										<td width="10%">Select Student</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<tr>
											<td width="10%">
												<select name="student" id="student" required style="width:460px;">
												<?php
													$sql2 ="SELECT * FROM student";
													$result2 = mysql_query($sql2);
													while($row2 = mysql_fetch_assoc($result2))  
													{
												?>
														<option value="<?php echo $row2 ['rno']; ?>"><?php echo $row2 ['rno']?></option>
												<?php 
													}	
												?>	
												</select>
											</td>
										</tr>
										<tr>
											<td colspan="3" align="center"><input type="submit" name="submit" value="Submit"></td>
										<tr/>
									</tr>
								</tbody>
							 </table>
						</form>
					</div>
					<!-- /.table-responsive -->

					<?php 
						
						$testid =isset($_GET['testid'])?$_GET['testid']:'';
						$student =isset($_GET['student'])?$_GET['student']:'';

						if($testid!=null && $student!=null)
						{
							$sql3 ="SELECT * FROM test_score where stid='$student' and testid='$testid'";
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