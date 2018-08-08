<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
    
  <style>
    * {
  margin: 0 auto;
  font-family: "Montserrat", sans-serif;
}
.slideshow {
  float: left;
  width: 400px;
  height: 800px;
  overflow: hidden;
  margin: 0 auto;
}

.slide-wrapper {
  width: 400px;
  height:800px;
  -webkit-animation: slide 18s ease infinite;
}

.slide {
  float: left;
  height: 800px;
  width: 500px;
}

.slide:nth-child(1) {
  background: #d93b65;
}

.slide:nth-child(2) {
  background: #037e8c;
}

.slide:nth-child(3) {
  background: #36bf66;
}

.slide:nth-child(4) {
  background: #d9d055;
}

.slide-number {
  color: #000;
  text-align: center;
  font-size: 10em;
}


.top {
  position: relative;
  top: 40px;
}
.signupbtn {
  position: relative;
  left: 250px;
  width: 100px;
  height: 40px;
  margin-left: 400px;
  border: 2px solid black;
  border-radius: 40px;
  cursor: pointer;
  font-size: 12px;
  font-weight:bold;
  background:white;
  bottom:30px;
}
small {
  float: left;
}

input[type="text"] {
  width: 600px;
  cursor: pointer;
  height: 40px;
}
      
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


.signup {
  float: right;
  width: 80%;
  background: white;
}

    
    </style>
</head>


<div class="signup">

  <div class="top">
      
  </div>

  <div class="middle">
      <form method="post" action="create.php" class="login-form"> <br>
    <form>
    <h2>Create Trip</h2>
    
	 
      <form>
         <h3><small>Trip Name</small></h3>
		 <br>
          <label for="Trip Name"></label>
         <input type="name" name="name" placeholder="Trip Name">
        <br><br>
          <h3><small>Image</small></h3>
          <br>
            <input type="file" name="T_image" placeholder="choose file"><br><br>
          <h3><small>Start Date</small></h3>
          <br>
          <label for="startdate"></label>
		  <input type="date" id="T_startdate" name="T_startdate">
          <br><br>
          <h3><small>End Date</small></h3>
          <br>
          <label for="enddate"></label>
          <input type="date" id="T_enddate" name="T_enddate">
          <br><br>
           
          <div class="form-group col-md-6 col-lg-6 col-sm-6">
  <h4>Trip Members</h4>
   <label for="Trip Members"></label>
   
  <!--<select id="DDLActivites" data-style="btn-default" class="selectpicker form-control" multiple  data-live-search="true" >--->
        
		<?php
		  include('dbconnection.php');
		  $query = "select U_id,U_email from user";
		  $result = mysqli_query($conn,$query);
		  
		  // echo "<select name='U_name' multiple>";
		?> <select name="email[]" size="5" multiple><?php
		  while ($row = mysqli_fetch_array($result)){
			  ?>
			<option value= <?php echo $row['U_id'];?>><br> <?php echo $row['U_email'];?></option><?php
		  }
		 // echo "</select>";
		 
		  ?>
		  	  
     </select>	 
            
		   
         <br><br><br><br><br><br>
		 
      <input type="submit" name="submit" value="Get Selected Values and create trip " color= yellow; />

          
          <br><br><br>
         
           
          </div>
        </form>
          </form>
      </form>
    </div>
    </div>
</html>