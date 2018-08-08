<?php
 include "dbconnection.php";
session_start();
$loggedUser = isset($_SESSION['loggedUser']) ? $_SESSION['loggedUser'] : array();
$userid=$loggedUser['Id'];
$T_id=$_SESSION['T_id'];

$query="SELECT E_name,E_amount FROM expanse WHERE 	E_user_id='$userid' and E_trip_id='$T_id'";

    
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Usage Share of Desktop Browsers"
	},
	subtitles: [{
		text: "November 2017"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>    