<?php

$lname="";
$gender="";
$date="";
$religion="";
$paddress="";
$peraddress="";
$phone="";
$email="";
$link="";
$username="";
$password="";



?>

<?php $db=mysqli_connect("localhost","root","","wtk");?>


<html>
<head>
	<title>Registration Form</title>
</head>
<body>
<h1> <center> Registration Form </h1>
	<fieldset>
	<legend><h1> Basic Information  : </h1></legend>
	<!-- form -->
	<form action="submit.php" method="POST" autocomplete="on" novalidate>
		

		<label for="fname">First Name:</label>
		<input type="text" id="fname" name="fname">

		<br><br>

		<label for="lname">Last Name:</label>
		<input type="text" id="lname" name="lname">

		<br><br>
		
		
         <label for="gender">Gender:</label>  <br>
		<input type="radio" id="male" name="gender" value="male">
		<label for="male">Male</label>
		<br>
		<input type="radio" id="female" name="gender" value="female">
		<label for="female">Female</label>
		<br>
		<input type="radio" id="other" name="gender" value="other">
		<label for="other">Other</label>
		<br>

		<br><br>
         <label for="fname">DoB:</label>
		<input type="date" id="date" name="date">
		<br>
		
		
		<label for="religion">Religion:</label>
		<select id="religion"><!-- multiple -->
			<option value="muslim">muslim</option>
			<option value="hindu">hindus</option>
			<option value="boddho">boddis</option>
		</select>
		<br><br>

		</fieldset>
       <br><br>
	   <fieldset>
	<legend><h1> Contact Information  : </h1></legend>

		<label for="paddress">Present Address:</label>
		<input type="textarea" id="paddress" name="texrarea">
  <br>
       <label for="peraddress">Permanent Address:</label>
		<input type="textarea" id="peraddress" name="texrarea">

		<br><br>
		
		<label for="email">Email:</label>
		<input type="email" id="email" name="email">

 <br>
        <label for="phone">Phone:</label>
		<input type="phone" id="phone" name="phone">

  <br> <br>
  <label for="link">Link:</label>
		<input type="link" id="link" name="link">
</fieldset>

<fieldset>
	<legend><h1> Account Information  : </h1></legend>
		
		
		<label for="username">Username:</label>
			<input type="text" name="username" id="username" value="">
			<span style="color:red"></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red"></span>

			<br><br>
		
		
		</fieldset>
		
<input type="submit" value="Submit">
		
		
	<table style="width: 80%" border="1">
<tr>
   
   <th>Name</th>
	<th>First Name </th>
	<th>Last Name </th>
	<th>Gender</th>
	<th>DoB</th>
	<th>Religion</th>
	<th>Present Address</th>
	<th>Permanent Address</th>
	<th>Phone</th>
	<th>Email</th>
	<th>Personal Website</th>
	<th>Username</th>
	<th>Password</th>
	</tr>
	<?php 
	$i =0;
	$qry="select * from users";
	$run=$db -> query($qry);
	if($run -> num_rows >0){
		while($row = $run -> fetch_assoc()){
		$id=$row['id'];	
		?>	
	<tr>
	<td><?php echo $i++;?></td>
	<td><?php echo $row['fname']; ?></td>
	<td><?php echo $row['lname']; ?></td>
	<td><?php echo $row['gender']; ?></td>
	<td><?php echo $row['date']; ?></td>
	<td><?php echo $row['religion']; ?></td>
	<td><?php echo $row['paddress']; ?></td>
	<td><?php echo $row['peraddress']; ?></td>
	<td><?php echo $row['phone']; ?></td>
	<td><?php echo $row['email']; ?></td>
	<td><?php echo $row['link']; ?></td>
	<td><?php echo $row['username']; ?></td>
	<td><?php echo $row['password']; ?></td>
	<td>
	
</tr>

</table>	
</form>
</body>
</html>



<?php
if(isset($_POST['submit'])){
		
$fname=$_POST['fname'];	
$lname=$_POST['lname' ];
$gender=$_POST['gender' ];
$date=$_POST['date' ];
$religion=$_POST['religion' ];
$paddress=$_POST['paddress' ];
$peraddress=$_POST['peraddress' ];
$phone=$_POST['phone' ];
$email=$_POST['email' ];
$link=$_POST['link' ];
$username=$_POST['username' ];
$password=$_POST['password' ];

	$qry="insert into customer values(null,'$fname' ,'$lname' , '$gender' , '$date' , '$religion' , '$paddress' ,'$peraddress', ' $phone', '$email','$link','$username', '$password')";
	if(mysqli_query($db,$qry)){
		echo '<script>alert("Sumitted successfully")</script>';
		header('location:submit.php');
	}else{
		echo mysqli_error();
	}
	}
?>