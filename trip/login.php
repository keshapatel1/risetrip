<?php 
if(!isset($_SESSION)) 
{
    session_start();
}
include "dbconnection.php";
$email = $_POST['email'];
$password= $_POST['password'];


$response = array();


$query ="select * from user where U_email ='$email' and U_password = '$password';";


$result = mysqli_query($conn,$query);
//print_r($result);
//exit();

if($result!='')

  {
    while($row = mysqli_fetch_array($result))
    {
  /*print_r($row);
        echo $row['U_name'];
      exit();*/
        $loggedUser = array('Name' => $row['U_name'], 'Id' => $row['U_id']);
    }
    $_SESSION ['loggedUser'] = $loggedUser; 
    // print_r($_SESSION ['loggedUser']);
     //exit();
	//$response['status']=1;
    
    //$response['message']="You are logged in";
   // echo json_encode($response);
    header("location: dashboard.php");
	  
}
else
{
    $message = "Something Went Wrong";
	//$response['status']=0;
	//$response['message']="login failed";
	//echo json_encode($response);
    header("location: form.php");
}
?>