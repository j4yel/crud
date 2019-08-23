<?php
	require('config/config.php');
	require('config/db.php');
	#create
	$query ='SELECT * FROM users ORDER BY created_at DESC';
	#Get result
	$result = mysqli_query($conn, $query);
	#Fetch data
	$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
	#free result
	mysqli_free_result($result);
	#close connection
	mysqli_close($conn);
?>

<?php include('inc\header.php'); ?>
<body>
	<div class="Jumbotron>">
		<h1 style= "text-align: center; font-family:'Impact'">USERS</h1>
	 <?php foreach($users as $user):  ?>
 		<div class="container" style="text-align:center">
 		<h3> <?php echo $user ['user_name']; ?> </h3>
 		<small>Create On <?php echo $user['created_at']; ?> </small>
<br>

<a class="btn btn-primary" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $user['id']; ?>">READ MORE</a>
</div>
 <?php endforeach; ?>
</div>


<?php include('inc\footer.php'); ?>