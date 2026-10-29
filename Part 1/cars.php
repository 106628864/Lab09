<?php
  require_once "settings.php";
$dbconn = @mysqli_connect($host,$user,$pwd,$sql_db);
if ($dbconn) {
  $query = "SELECT * FROM cars";
  $result = mysqli_query ($dbconn,$query);
  if ($result) {...}
  else {...}

...
mysqli_close($dbconn);
} else echo "<p>Unable to connect to the db. </p>";
?>
