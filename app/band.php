<!DOCTYPE html>
<html>
<head>
	<title>Mailing List</title>
	<style>
		table{
			width:100%;
		} 
		td{
			padding: 5px;
		}
	</style>
</head>
<body>
<h1>Add New User</h1>
<form action="." method="post">
	<input type="text" name="first_name" placeholder="First">
	<input type="text" name="last_name" placeholder="Last">
	<input type="text" name="email" placeholder="Email">
	<input type="submit" value="Submit">
</form>

<h1>Database Status</h1>

<?php 

	$db = new mysqli('localhost', 'root', 'root', "mailingList");

	if( $db->connect_errno > 0){
		die('Unable to connect ['.$db->connect_error."]");
	} else {
		echo ("<ul><li>Connected Successfully</li>");
	}

$sql = <<<SQL
	INSERT INTO  users (
	first_name ,
	last_name ,
	email
	)
	VALUES (
	 '$_POST[first_name]',  '$_POST[last_name]',  '$_POST[email]'
	);
SQL;

$sqlGet = <<<SQL
	SELECT * FROM users
SQL;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  	if(!$result = $db->query($sql)){
		die('<li>Error Posting to database ['.$db->error."]</li></ul>");
	} else {
		echo("<li>Post Successful</li></ul>");
	}  
}elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
	echo "</ul>";
}

 ?>


<h1>All Users</h1>

<table border="1">
	<tr>
		<th>First </th>
		<th>Last</th>
		<th>Email</th>
	</tr>
	<?php 

	if(!$result = $db->query($sqlGet)){
		die('<li>Error Posting to database ['.$db->error."]</li></ul>");
	} else {
		while($row = $result->fetch_assoc() ){
			echo "<tr><td>".$row['first_name']."</td><td>".$row['last_name']."</td><td><a href='mailto:".$row['email']."''>".$row['email']."</a></td>";	
		}
	}  
	 ?>

</table>

</body>
</html>