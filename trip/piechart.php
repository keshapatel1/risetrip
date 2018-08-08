<?php
session_start();
include('dbconnection.php');
$loggedUser= $_SESSION['loggedUser'];
$userid=$loggedUser['Id'];
$T_id=$_SESSION['T_id'];

$query = "select E_name, E_amount from expanse where E_user_id='$userid' and E_trip_id='$T_id'";
//echo $query;

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
 
function drawChart() {
 
    var data = google.visualization.arrayToDataTable([
      ['E_name', 'E_amount'],
      <?php
      while($row=mysqli_fetch_array($result))
	  {
          
            echo "['".$row['E_name']."', ".$row['E_amount']."],";
          
      }
      ?>
    ]);
    
    var options = {
        title: 'My Expense chart',
        width: 900,
        height: 500,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}
</script>
</head>
<body>
    <!-- Display the pie chart -->
    <div id="piechart"></div>
</body>
</html>