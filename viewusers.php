<?php 
include_once("dbconect2.php");
	$query="select * from users";
	$submit=mysqli_query($conn,$query);
	$resultcheck=mysqli_num_rows($submit);

	


?>

<!DOCTYPE html>
<html>
<head>
	<title>view users</title>
	<style type="text/css">
		table,tr,td,th{
			border: 2px solid black;
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<th>
				id
			</th>
			<th>
				firstname
			</th>
			<th>
				lastname
			</th>
			<th>
				email
			</th>
			<th >Actions</th>
		</tr>
		<?php
			if($resultcheck>0){
		while($row=mysqli_fetch_assoc($submit)){
		 $id= $row["userid"];
		$name= $row["firstname"];
		$lastname=$row["lastname"];
		$email=	$row["email"];
		// session_start()
		// $_SESSION["id"]=$id;
		

		
		?>
		<tr>
			<td><?php echo $id; ?></td>
			<td><?php echo $name; ?></td>
			<td><?php echo $lastname; ?></td>
			<td><?php echo $email;?></td>
			<td ><a href="delete.php?id=<?php echo $id; ?>">Delete </a><a href="Update.php?id=<?php echo $id; ?>">Update</a></td>
		</tr>
	<?php }} ?>
	</table>
	<h1>

	</h1>


</body>
</html>