<DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/styles.css" rel="stylesheet" media="screen">
</head>
<body>
<!--NAVIGATION-->
<nav>
    <div class="navbar-inverse">
        <div class="container">

                <a class="navbar-brand">BooshApp</a>

        </div>
    </div>
</nav>
<!--END NAVIGATION-->
<div class="jumbotron">
  <div class="container">
  <h1>Search This SHIT</h1>
  <p>You know you want to</p>
  <div class="input-group">
        <form action="./results.php" method="post">
            <input type="text" name="search" class="form-control" placeholder="Search Anything">
            <input style="width:100%;" id="search_input" class="btn btn-default" type="submit" value="submit"> 
        </form>
    </div>
  </div>
</div>
<section >
    <div class="container">
    	<div class="row">
    		<div class="col-lg-12 col-sm-12">
    		<div class="well">
    			

<?php 

	// echo ($_POST[band_name]); 

	$db = new mysqli('localhost', 'root', 'root', "boosh");

	if( $db->connect_errno > 0){
		die('Unable to connect ['.$db->connect_error."]");
	} else {
	}


$sqlGetBands = <<<SQL
	SELECT * FROM bands
SQL;

$sqlGetVenues = <<<SQL
	SELECT * FROM venues
SQL;


//Running the query and storing the results
if(!$result = $db->query($sqlGetBands)){
	die('<li>Error Posting to database ['.$db->error."]</li></ul>");//ending the operation if there is a connection error
} else {
	echo "<h2>BANDS</h2>";
	echo "<table class='table table-striped table-bordered'>";
	echo "<tr> <th>ID</th> <th> Name </th> </tr>";
	while($row = $result->fetch_assoc() ){
		echo "<tr><td>".$row['band_id']."</td><td>".$row['band_name']."</td></tr>";	
	}
	echo "</table>";
}  

if(!$result = $db->query($sqlGetVenues)){
	die('<li>Error Posting to database ['.$db->error."]</li></ul>");
} else {

	echo "<h2>VENUES</h2>";
	echo "<table  class='table table-striped table-bordered'>";
	echo "<tr> <th>ID</th> <th> Name </th> </tr>";

	while($row = $result->fetch_assoc() ){
		echo "<tr><td>".$row['venue_id']."</td><td>".$row['venue_name']."</td></tr>";	
	}
	echo "</table>";
}  

 ?>

    		</div>
    		
</div>
    	</div>
    </div>
    </section>

<!-- JavaScript plugins (requires jQuery) -->
<script src="http://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
