<?php header("Location: ".$_SERVER['HTTP_REFERER']); ?>
<?php
print_r($_GET);

$db = mysqli_connect('localhost', 'root', 'root', "boosh");

$sqlQuery = "DELETE FROM `".$_GET["type"]."s` WHERE `".$_GET["type"]."_id` = ".$_GET["id"];

mysqli_query($db,$sqlQuery);
mysqli_close($db);
?>