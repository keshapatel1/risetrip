<?php
if(!isset($_SESSION)) 
{
    session_start();
}
$loggedUser = isset($_SESSION['loggedUser']) ? $_SESSION['loggedUser'] : array();

?>

<?php
include ("dbconnection.php");
$userid = $loggedUser['Id'];
$response=array();
?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<style>
    
.button {
  display: inline-block;
  padding: 7px 20px;
  font-size: 15px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #F4D03F;
  border: none;
  border-radius: 15px;
  /*box-shadow: 0 9px #999;*/
}

.button:hover {background-color: #F4D03F}

.button:active {
  background-color: #F4D03F;
  /*box-shadow: 0 5px #666;
  transform: translateY(15px);*/
}
* {
    box-sizing: border-box;
}
    img:hover {
    -webkit-transform: scaleX(-1);
    transform: scaleX(-1);
}
img {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.column {
    float: right;
    width: 33.33%;
    padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
    content: "";
    clear: both;
    display: table;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 500px) {
    .column {
        width: 100%;
    }
}
</style>
</head>
<body> 

<button class="button" onclick="location.href='form.php'" align="left">Logout</button><br>
    
 <center>       
<h2>Trip</h2>
    <hr>
     <button class="button"  onclick="location.href='tripform.php'"  align="center">Add trip</button>
    </center>
    <br>

    
Welcome <?php echo $loggedUser['Name'];
    ?>
    &nbsp;
    </br>
    
  <?php    
    $query="select T_id,T_name,T_image FROM trp_1 INNER JOIN traveller  ON traveller.Trip_id=trp_1.T_id where traveller.User_id='$userid'";
      /*echo $query;
    exit();*/
 $result = mysqli_query($conn,$query);
      while($row = mysqli_fetch_array($result))
      {
          
    echo $row['T_name'];
      ?>
      <a href="expanse.php?id=<?php echo $row['T_id']?>">
          
          <img src="images/<?php echo $row['T_image']; ?> "width="300px" height="180px">
          <?php
      }
    ?>
    </a>
</html>

      


