

<?php 

	echo ($_POST[band_name]); 
	//$db is the element containing the location of the mysql database
	$db = new mysqli('localhost', 'root', 'root', "boosh");

	if( $db->connect_errno > 0){
		die('Unable to connect ['.$db->connect_error."]");
	} else {
		echo ("<ul><li>Connected Successfully</li>");
	}

$sql = <<<SQL
	INSERT INTO  bands (
	band_name 
	)
	VALUES (
	 '$_POST[band_name]'
	);
SQL;

$sqlGet = <<<SQL
	SELECT * FROM bands
SQL;


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  	if(!$result = $db->query($sql)){
		die('<li>Error Posting to database ['.$db->error."]</li></ul>");
	} else {
		echo("<li>Post Successful</li></ul>");
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
