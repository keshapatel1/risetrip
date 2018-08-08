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
    header('Location:login.php');
    exit;
}

include ('dbconnection.php');

$response=array(); 

@$E_name= $_POST ['E_name'];
@$E_date= $_POST ['E_date'];
@$E_amount= $_POST['E_amount'];
@$userid=$loggedUser['Id'];
@$T_id=$_SESSION['T_id'];
@$E_cat_id=$category;
//echo $E_cat_id;
//exit();
    
$query = "INSERT INTO expanse('E_trip_id','E_user_id','E_name','E_date','E_amount','E_cat_id') VALUES ('$T_id','$userid','$E_name','$E_date','$E_amount','$E_cat_id')";

echo $query;
exit();


 if(mysqli_query($conn, $query))
			  {
				  echo mysqli_error($conn);
				$response['status']=1;
				$response['message']="Registartion Successful";
				echo json_encode($response);
				header("Location:dashboard.php");
				
			  }
			  else
			  {
				echo mysqli_error($conn);
				$response['status']=0;
				$response['message']="Registartion not Successful, please try again";
				echo json_encode($response);	
			  
				}
?>