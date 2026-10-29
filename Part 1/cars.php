<?php
  require_once "settings.php";
  
  $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
  
  if ($dbconn) {
      $query = "SELECT * FROM cars";
      $result = mysqli_query($dbconn, $query);
  
      if ($result) {
          if (mysqli_num_rows($result) > 0) {
              echo "<table border='1' cellpadding='8' cellspacing='0'>";
  
              // Table headings
              echo "<tr>";
              echo "<th>Car ID</th>";
              echo "<th>Make</th>";
              echo "<th>Model</th>";
              echo "<th>Price</th>";
              echo "<th>Year of Manufacture</th>";
              echo "</tr>";
  
              // Display of car records
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars((string)$row['car_id']) . "</td>";
                  echo "<td>" . htmlspecialchars((string)$row['make']) . "</td>";
                  echo "<td>" . htmlspecialchars((string)$row['model']) . "</td>";
                  echo "<td>" . htmlspecialchars((string)$row['price']) . "</td>";
                  echo "<td>" . htmlspecialchars((string)$row['yom']) . "</td>";
                  echo "</tr>";
              }
  
              echo "</table>";
          } else {
              echo "There are no cars to display.";
          }
  
          mysqli_free_result($result);
      } else {
          echo "Error retrieving car records: " . htmlspecialchars(mysqli_error($dbconn));
      }
  
      mysqli_close($dbconn);
  } else {
      echo "Unable to connect to the database.";
  }
?>
