
<?php
include ("dbconnection.php");
session_start();
$loggedUser= $_SESSION['loggedUser'];
$userid = $loggedUser['Id'];
 ?><?php
$T_id= $_GET['id'];	
echo $T_id;
$_SESSION['T_id'] = $T_id;
    //echo $T_id;
?>
  


<html>
<head><title>My Expense On Trip</title>
<h1>My Expense On Trip</h1>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    
.btn {
    border: none;
    background-color: inherit;
    padding: 14px 28px;
    font-size: 20px;
    cursor: pointer;
    display: inline-block;
}

.btn:hover {background: #eee;}

.success {color: green;}
.info {color: dodgerblue;}
.warning {color: orange;}
.danger {color: red;}
.default {color: black;}
</style>
</head>
<body>
    




<button class="btn success" onclick="location.href='expence1.php'">Add</button>
   <a href="dashboard.php?id=<?php echo $row['T_id']?>"> 
    
<button class="btn info" onclick="location.href='piechart.php'">Report</button>
    </a>
    </body>
</html>