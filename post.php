<?php

	require('config/config.php');
	require('config/db.php');


	if(isset($_POST['delete']))
	{
		$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
		$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
		$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
		$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$age = mysqli_real_escape_string($conn, $_POST['age']);

	

	$query = "DELETE FROM users WHERE id = {$delete_id}";

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
		<div class="Jumbotron">
		<h1 style= "text-align:center; font-family:'Impact'">USERS</h1>
	 
 		<div class="container" style= "text-align: center">
 		<h3> <?php echo $user['user_name']; ?> </h3>
 		<h3>AGE: <?php echo $user['age']; ?> </h3>
 		<h4> EMAIL: <?php echo $user['email']; ?> PASSWORD: <?php echo $user['password']; ?> </h3>
 		<h4>NAME: <?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></h4>

 		<small>Create On <?php echo $user['created_at']; ?> </small>
 		<br>
 		<form class='pull-right' method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
 			<input type="hidden" name="delete_id" value="<?php echo $user['id']; ?> ">
 			<input type="submit" name="delete" value="DELETE" class="btn btn-danger">
 		
 		<a href="<?php echo ROOT_URL; ?>edituser.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">EDIT</a>
 		<a class="btn btn-success" href="<?php echo ROOT_URL; ?>index.php">BACK</a> 
<hr class="my-4">
	</form>
 		<br>
		 </div>

 </div>


<?php include('inc\footer.php'); ?>