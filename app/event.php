

<?php 

	echo ($_POST[band_name]); 
	//creating a connection to the database 
	$db = new mysqli('localhost', 'root', 'root', "boosh");
	//the if statement is testing for connection errors 
	if( $db->connect_errno > 0){
		die('Unable to connect ['.$db->connect_error."]");//ending the connection to database if error is detected
	} else {
		echo ("<ul><li>Connected Successfully</li>");//printing the statement that connection has been successful
	}
//setting up the database to insert venue name into venues
$sql = <<<SQL
	INSERT INTO  events (
	event_name,
	event_date,
	band_id,
	venue_id,
	)
	VALUES (
	 '$_POST[event_name]'
	);
SQL;
//setting up the query to pull venues from database
$sqlGet = <<<SQL
	SELECT * FROM events
SQL;


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  	if(!$result = $db->query($sql)){//checking for errors posting into the database
		die('<li>Error Posting to database ['.$db->error."]</li></ul>");//ending the posting of information into the database if error is dected
	} else {
		echo("<li>Post Successful</li></ul>");//printing the statment that the input into the database was successful
	}  
// }elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
// 	echo "</ul>";
// }

 ?>

	<?php 

	// if(!$result = $db->query($sqlGet)){
	// 	die('<li>Error Posting to database ['.$db->error."]</li></ul>");
	// } else {
	// 	while($row = $result->fetch_assoc() ){
	// 		echo "<tr><td>".$row['first_name']."</td><td>".$row['last_name']."</td><td><a href='mailto:".$row['email']."''>".$row['email']."</a></td>";	
	// 	}
	// }  
	 ?>
