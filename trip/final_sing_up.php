<?php

include "dbconnection.php";

$name= $_POST['name'];
/*echo $name;
exit();*/
$email= $_POST['email'];
$mobile= $_POST['mobile'];
$password= $_POST['password'];
$active= 1;

$response = array();

$query = "INSERT INTO user (U_name,U_email,U_mobile,U_password) VALUES('$name','$email','$mobile','$password')";
//echo $query;
//exit();
if(mysqli_query($conn, $query))
{
 $response['status'] = 1;
 $response['message'] = "Registration Succesfully";
 echo json_encode($response);
 header("location:http://localhost:8080/trip/form.php");
}
 else
 {
  $response['status'] = 0;
 $response['message'] = "Registration Not Succesfully";
 echo json_encode($response);
 }
 ?>