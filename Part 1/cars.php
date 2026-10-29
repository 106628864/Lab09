<?php
  require_once "settings.php";
  $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
  
  if ($dbconn) {
      $query = "SELECT * FROM cars";
      $result = mysqli_query($dbconn, $query);
  
      if ($result) {
          echo "<h2>Cars List</h2>";
  
          if (mysqli_num_rows($result) > 0) {
              echo "<table border='1' cellpadding='8' cellspacing='0'>";
  
              // Display the column headings
              echo "<tr>";
              while ($field = mysqli_fetch_field($result)) {
                  echo "<th>" . htmlspecialchars($field->name) . "</th>";
              }
              echo "</tr>";
  
              // Display the records
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
  
                  foreach ($row as $value) {
                      echo "<td>" . htmlspecialchars((string)($value ?? "")) . "</td>";
                  }
  
                  echo "</tr>";
              }
  
              echo "</table>";
          } else {
              echo "<p>No cars found in the database.</p>";
          }
  
          mysqli_free_result($result);
      } else {
          echo "<p>Error executing query: " . htmlspecialchars(mysqli_error($dbconn)) . "</p>";
      }
  
      mysqli_close($dbconn);
  } else {
      echo "<p>Unable to connect to the database.</p>";
  }
?>
