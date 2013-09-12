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
                <a href="../" class="navbar-brand">BooshApp</a>
                <form class="navbar-form navbar-right pull-right" action="./results.php" method="get">
                    <input type="text" name="search" class="form-control" style="width:auto;" placeholder="Search Anything">
                    <input id="search_input" class="btn btn-default" type="submit" value="submit">
                </form>
        </div>
    </div>
</nav>
<!--END NAVIGATION-->
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

    $query = $_GET["search"];


$sqlGetBands = <<<SQL
	SELECT * FROM bands WHERE band_name LIKE '$query'
SQL;

$sqlGetVenues = <<<SQL
	SELECT * FROM venues WHERE venue_name LIKE '$query'
SQL;

$sqlGetEvents = <<<SQL
SELECT bands.*, venues.*, events.*
FROM events
    JOIN bands
        ON bands.band_id = events.band_id
    JOIN venues
        ON venues.venue_id = events.venue_id
    WHERE band_name LIKE '$query' OR venue_name LIKE '$query' OR event_name LIKE '$query'
SQL;



//Running the query and storing the results
if(!$result = $db->query($sqlGetBands)){
	die('<li>Error Posting to database ['.$db->error."]</li></ul>");//ending the operation if there is a connection error
} else {
	echo "<h2>BANDS</h2>";
	echo "<table class='table table-striped table-bordered'>";
	echo "<tr><th>Band Name </th> </tr>";
	while($row = $result->fetch_assoc() ){
		echo "<tr><td>".$row['band_name']."</td></tr>";	
	}
	echo "</table>";
}  

if(!$result = $db->query($sqlGetVenues)){
	die('<li>Error Posting to database ['.$db->error."]</li></ul>");
} else {

	echo "<h2>VENUES</h2>";
	echo "<table  class='table table-striped table-bordered'>";
	echo "<tr><th>Venue Name </th> </tr>";

	while($row = $result->fetch_assoc() ){
		echo "<tr><td>".$row['venue_name']."</td></tr>";	
	}
	echo "</table>";
}

if(!$result = $db->query($sqlGetEvents)){
    die('<li>Error Posting to database ['.$db->error."]</li></ul>");
} else {

    echo "<h2>EVENTS</h2>";
    echo "<table  class='table table-striped table-bordered'>";
    echo "<tr> <th> Event </th> <th> Date </th> <th> Band </th> <th> Venue </th></tr>";

    while($row = $result->fetch_assoc() ){
        echo "<tr><td>".$row['event_name']."</td><td>".$row['event_date']."</td><td>".$row['band_name']."</td><td>".$row['venue_name']."</td></tr>";
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
