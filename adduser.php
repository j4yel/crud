<?php
	require('config/config.php');
	require('config/db.php');
	

	if(isset($_POST['submit']))
	{
		$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
		$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
		$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
		$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$age = mysqli_real_escape_string($conn, $_POST['age']);
	

	$query = "INSERT INTO users(user_name, first_name, last_name, email, password, age) VALUES ('$user_name', '$first_name', '$last_name', '$email', '$password', '$age')";

	if(mysqli_query($conn, $query))
	{
		header('Location:'.ROOT_URL.'');
	}
	else{ echo 'ERROR:' .msqli_error($conn);}

}
?>


<?php include('inc\header.php'); ?>
<body>
	<div class="Jumbotron" style= "text-align: center">
		<h1 style= "text-align: center; font-family:'Roboto'">ADD USER</h1>
	 	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
	 		<div>
	 			<label>Username</label>
				<input type="name" name="user_name" class="form-control">

	 		</div>
	 		<div>
	 			<label>Email</label>
				<input type="email" name="email" class="form-control">

	 		</div>
	 		<div>
	 			<label>Password</label>
				<input type="password" name="password" class="form-control">

	 		</div>
			<div>
	 			<label>Firstname</label>
				<input type="name" name="first_name" class="form-control" >

	 		</div>
	 		<div>
	 			<label>Lastname</label>
				<input type="name" name="last_name" class="form-control">
	 		</div>
			<div>
	 			<label>Age</label>
				<input type="age" name="age" class="form-control">

	 		</div>
	 		<br>
	 		<input type="submit" name="submit" class="btn btn-primary">
	 		<a class="btn btn-success" href="<?php echo ROOT_URL; ?>index.php">BACK</a> 
	 	</form>
</div>


<?php include('inc\footer.php'); ?>