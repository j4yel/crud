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

	

	$query = "UPDATE users SET age='$age', password='$password', email='$email', user_name='$user_name', first_name='$first_name', last_name='$last_name' WHERE id= {$update_id}";

	if(mysqli_query($conn, $query))
	{
		header('Location:'.ROOT_URL.'');
	}
	else{echo 'ERROR:'.msqli_error($conn);}
}

	#get id
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	
	$query = 'SELECT * FROM users WHERE id = '. $id;
	#Get result
	$result = mysqli_query($conn, $query);
	#Fetch data
	$user = mysqli_fetch_assoc($result);

	#free result
	mysqli_free_result($result);

	#close connection
	mysqli_close($conn);


?>


<?php include('inc\header.php'); ?>
<body>
	<div class="Jumbotron" style= "text-align: center">
		<h1 style= "text-align: center; font-family:'Roboto'">EDIT USER</h1>
	 	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
	 		<div>
	 			<label>Username</label>
				<input type="name" name="user_name" class="form-control" value="<?php echo $user['user_name']; ?>" >

	 		</div>
	 		<label>Email</label>
				<input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" >

	 		</div>
	 		<label>Password</label>
				<input type="password" name="password" class="form-control" value="<?php echo $user['password']; ?>" >

	 		</div>
			<div>
	 			<label>Firstname</label>
				<input type="name" name="first_name" class="form-control" value="<?php echo $user['first_name']; ?>" >
	 		</div>
	 		<div>
	 			<label>Lastname</label>
				<input type="name" name="last_name" class="form-control" value="<?php echo $user['last_name']; ?>" >
	 		</div>
			<label>Age</label>
				<input type="age" name="age" class="form-control" value="<?php echo $user['age']; ?>" >

	 		</div>
	 		<br>
	 		<input type="hidden" name="update_id" value="<?php echo $user['id']; ?>">
	 		<input type="submit" name="submit" value="Edit" class="btn btn-primary">
	 		<a class="btn btn-success" href="<?php echo ROOT_URL; ?>">BACK</a> 
	 	</form>
</div>


<?php include('inc\footer.php'); ?>