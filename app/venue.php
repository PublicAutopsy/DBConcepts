

<?php 
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
	venue_name 
	)
	VALUES (
	 '$_POST[venue_name]'
	);
SQL;
//setting up the query to pull venues from database
$sqlGet = <<<SQL
	SELECT * FROM venues
SQL;

  	if(!$result = $db->query($sql)){//checking for errors posting into the database
		die('<li>Error Posting to database ['.$db->error."]</li></ul>");//ending the posting of information into the database if error is dected
	} else {
		echo("<li>Post Successful</li></ul>");//printing the statment that the input into the database was successful
	}
 ?>
