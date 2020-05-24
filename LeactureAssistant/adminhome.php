<script src="./assets/script/canvasjs.min.js"></script>

<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<center><strong>Attendance</strong></center>
				</div>

				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<form action="adminhome.php">
							<table class="table table-striped table-bordered table-hover"
								id="dataTables-example">
								
								<thead>
									<tr>
										<td width="10%">Select School</td>
										<td width="10%">Select Year</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<tr>
											<td width="10%">
												<select name="school" id="school" required style="width:460px;">
												<?php
													$sql2 ="SELECT * FROM  school";
													$result2 = mysql_query($sql2);
													while($row2 = mysql_fetch_assoc($result2))  
													{
												?>
														<option value="<?php echo $row2 ['schoolid']; ?>"><?php echo $row2 ['name']."-".$row2 ['village'] ?></option>
												<?php 
													}	
												?>	
												</select>
											</td>
											<td width="10%">
												<select name="year" id="year" required style="width:460px;">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
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
						
						$school =isset($_GET['school'])?$_GET['school']:'';
						$year =isset($_GET['year'])?$_GET['year']:'';

						if($school!=null && $year!=null)
						{
							$sql3 ="SELECT * FROM student where schoolid='$school' and year='$year'";
							$result = mysql_query($sql3);
						
					?>

					<script>
						window.onload = function () {
							
						var chart = new CanvasJS.Chart("chartContainer", {
							animationEnabled: true,
							
							title:{
								text:"Attendance Percentage"
							},
							axisX:{
								interval: 1
							},
							axisY2:{
								interlacedColor: "rgba(1,77,101,.2)",
								gridColor: "rgba(1,77,101,.1)",
								title: "Percentage"
							},
							data: [{
								type: "bar",
								name: "Students",
								axisYType: "secondary",
								color: "#014D65",
								dataPoints: [
									
									<?php while($row = mysql_fetch_assoc($result))  {
										
										$rno=$row ['rno'];
										
										$result = mysql_query("select (count(status)*100/(select Count(*) From attendance where sid='$rno')) as cnt FROM attendance where status='yes' and sid='$rno'");
										$row = mysql_fetch_array($result);
										$cnt=$row["cnt"];
										
									?>
										{ y: <?php echo $cnt; ?>, label: <?php echo $rno; ?> }

									<?php
									}
									?>
								]
							}]
						});
						chart.render();

						}
						</script>

					 <div id="chartContainer" style="height: 300px; width: 100%;"></div>
					
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