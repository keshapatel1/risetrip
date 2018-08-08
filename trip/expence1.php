

<?php

if (!isset($_SESSION)) 
{
    session_start();
}
$loggedUser = isset($_SESSION['loggedUser']) ? $_SESSION['loggedUser'] : array();
 //$_SESSION['id']=$id;
//print_r($loggedUser);
//exit();

?>
<?php
if(!isset($_SESSION['loggedUser'])) 
{
    header('Location: login.php');
    exit;
}
include ('dbconnection.php');


?>
<!DOCTYPE html>
<html>
<head>
    
<style>
    body  {
   
    
    color:#0f0f0f;
    text-align:center;
    background-image: url('expp.jpg');
    
    background-size: cover;
    

}
body {font-family: arial, Helvetica, sans-serif;}


input[type=trip_name], input[type=start_date]input[type=end_date]input[type=T_img] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}



button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.dp {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 100px) {
    span.psw {
       display:inline-block ;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
    
</head>
<body>

<h2>WELCOME TO TRIP</h2>

  <form method="post" action="#" class="login-form">
	
  <h1> <?PHP $userid=$loggedUser['Id'];
       echo $userid;?></h1>
      <div class="form">
          <h2 style="text-align:center;">Add Travellers</h2>
         
         </div>
      <div class="form">
          <h2 style="text-align:center;">ENTER EXPENCE</h2>
         
         </div>
       
  <!--<div class="imgcontainer">
    <img src="expp.jpg" alt="Avatar" class="avatar">
  </div>-->

   <div class="container">
    <label for="name">Expense Name</label>
      
      
  
      <br><input type="name" name="E_name" placeholder="E_name" required/><br>
   

    <div>
        
        <label for="start">Date</label>
        <br><input type="date" id="start" name="E_date"
               value=" "
               /><br>
    </div>

    <div>
        
        <label for="start">Amount</label>
       <br> <input type="amount" id="E_amount" name="E_amount"
               value=" "
              / ><br>
    
      </div>
        <?PHP// $id=$_GET['id'];
          //echo $id;
        //$_SESSION['id']=$id;
        ?>
        
    </div>
      <div>
        <br>
          <div class="fs"><h4>Select Catagory:</h4>
		<body><select name="cname[]"  multiple>
<?php
include ('dbconnection.php');
//echo mysqli_error ($conn);
$query = "SELECT C_id, C_name FROM category;";
$result = mysqli_query($conn,$query);
?> <?php
while($row = mysqli_fetch_array($result))
{
                    ?><option value= <?php echo $row['C_id'];?>> <?php echo $row['C_name'];?></option>
 
                    
						<?php 
                        }
							  
					?></select>
                
                <h2><input type="submit" name="submit" value="Get Selected Values" /></h2>
              </body>
          </div>
      </div>
            </form>
           <?php
if(isset($_POST['submit']))
{

foreach ($_POST['cname'] as $select)
{
echo "You have selected :" .$select; // Displaying Selected Value
    $response=array(); 

@$E_name= $_POST ['E_name'];
@$E_date= $_POST ['E_date'];
@$E_amount= $_POST['E_amount'];
@$userid=$loggedUser['Id'];
@$T_id=$_SESSION['T_id'];
@$E_cat_id=$select;
//echo $E_cat_id;
//exit();
    
$query = "INSERT INTO `expanse`(`E_trip_id`, `E_user_id`, `E_name`, `E_date`, `E_amount`, `E_cat_id`) VALUES ('$T_id','$userid','$E_name','$E_date',' $E_amount','$E_cat_id');";

   

echo $query;
//exit();
 
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
 
}}?>
          </div></div></form></body></html>