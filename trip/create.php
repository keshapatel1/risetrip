<?php

if (!isset($_SESSION)) 
{
    session_start();
}
$loggedUser = isset($_SESSION['loggedUser']) ? $_SESSION['loggedUser'] : array();
//print_r($loggedUser);
//exit();
?>
<?php
if(!isset($_SESSION['loggedUser'])) 
{
    header('Location:.dashboard.php');
    exit;
}


include "dbconnection.php";
//echo mysqli_error ($conn);

//@$Id= $_POST['Id'];
@$name= $_POST['name'];
//echo $name;
//exit();
@$T_startdate= $_POST['T_startdate'];
@$T_enddate= $_POST['T_enddate'];
@$T_image= $_POST['T_image'];
@$creator= $loggedUser['Id'];
//$active= 1;
$response = array();

$query = "INSERT INTO `trp_1` (`T_name`, `T_startdate`, `T_enddate`, `T_creator`, `T_image`) VALUES ('$name', '$T_startdate', '$T_enddate', '$creator','$T_image');";
//echo $query;
//exit();
$result = mysqli_query($conn,$query);
if($result != '')
{
    $lastid = mysqli_insert_id(($conn));
         echo "T_ID : ".$lastid;?><br><?php
     if(isset($_POST['submit']))
{
$x=1;
    foreach ($_POST['email'] as $select)
        {
        echo "You have selected :".$select;?><br><?php
        $x++;
     //echo $x;
   $response = array();
        $que="INSERT INTO `traveller` (`Trip_id`, `User_id`) VALUES ('$lastid', '$select');";

        
      echo $que;
      $result = mysqli_query($conn,$que); 
if($result != '')
{
    
	$response['status']=1;
	$response['message']="loging successful";
	echo json_encode($response);
    header('location: dashboard.php');
}
        
        else
{
	$response['status']=0;
	$response['message']="loging Not successful";
	echo json_encode($response);}


    }
        
 
    }
}

 
 ?>