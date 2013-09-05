<DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/styles.css" rel="stylesheet" media="screen">
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
    <form action="app/results.php" method="get">
        <form action="app/results.php" method="post">
            <input type="text" name="search" class="form-control" placeholder="Search Anything">
            <input style="width:100%;" id="search_input" class="btn btn-default" type="submit" value="submit"> 
        </form>
    </form>
    </div>
  </div>
</div>

<section >
    <div class="container">
    <h1 style="color:#fff;">Or add something...</h1>
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <div class="well">
                    <div class="input">
                        <img src="images/band.jpg">
                        <h3>Band Input</h3>
                        <div class="input-group">
                            <form action="app/band.php" method="post">
                                <input type="text" name="band_name" class="form-control" placeholder="Band Name">
                                <input style="width:100%;" id="band_input" class="btn btn-default" type="submit" value="submit"> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>

           
            <div class="col-lg-4 col-sm-4">

                <div class="well">
                    <div class="input">
                        <img src="images/venue.jpg">
                        <h3>Venue Input</h3>
                        <div class="input-group">
                            <form action="app/venue.php" method="post">
                                <input type="text" name="venue_name" class="form-control" placeholder="Venue Name">
                                <input style="width:100%;" id="venue_input" class="btn btn-default" type="submit" value="submit"> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-lg-4 col-sm-4">

                <div class="well">
                    <div class="input">
                        <img src="images/event.jpg">
                        <h3>Event Input</h3>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Event Name"></input>
                            <input type="text" class="form-control" placeholder="Event Date"></input>
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
?>

                            <select name="Bands" id="band_select">
                                <?php
                                    if(!$result = $db->query($sqlGetBands)){
                                       
                                    } else {

                                        while($row = $result->fetch_assoc() ){
                                            echo "<option value=' ".$row['band_id']." '> ".$row['band_name']."</option>";  
                                        } 
                                    }
                                 ?>
                            </select>
                            <select name="Venues" id="venue_select">
                                <?php
                                    if(!$result = $db->query($sqlGetVenues)){
                                       
                                    } else {

                                        while($row = $result->fetch_assoc() ){
                                            echo "<option value='".$row['venue_id']."'> ".$row['venue_name']."</option>";  
                                        } 
                                    }
                                 ?>
                            </select>
                            <button style="width:100%;" id="event_input" class="btn btn-default" type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

<!-- JavaScript plugins (requires jQuery) -->
<script src="http://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
