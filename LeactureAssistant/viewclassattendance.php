<script src="./assets/script/canvasjs.min.js"></script>

<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php

$username=$_SESSION['username'];

$school="";
$year="";

$sql2 ="SELECT * FROM  faculty where facultyid='$username'";
$result2 = mysql_query($sql2);
while($row2 = mysql_fetch_assoc($result2))  
{
	$school=$row2 ['schoolid'];
	$year=$row2 ['year'];
}	

$sql ="SELECT * FROM  student where schoolid='$school' and year='$year'";
$result = mysql_query($sql);

?>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<!-- /.panel-heading -->
				<div class="panel-body">

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

