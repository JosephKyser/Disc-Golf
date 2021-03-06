<!DOCTYPE html>
<html>
<head>
  <title>Disc Golf - Stats</title>
  <?php include('include/head.php'); ?>
</head>
<body>
  <?php include 'include/topnav.php'; ?>

  <h1>Statistics</h1>

  <?php
    $directory = 'ScriptFiles/';

    if (!is_dir($directory)) {
        exit('Invalid diretory path');
    }

    $command = escapeshellcmd('python3 Python/totalWins.py');
    $output = shell_exec($command);
    echo  "<h2> Total Wins </h2>";
    echo "<table class='content'>\n\n";
    $f = fopen($directory. "Total_Wins.csv", "r");
    while (($line = fgetcsv($f)) !== false) {
      echo "<tr>";
      foreach ($line as $cell) {
        echo "<td>" . htmlspecialchars($cell) . "</td>";
      }
      echo "</tr>\n";
    }
    fclose($f);
    echo "\n</table>";

    $command = escapeshellcmd('python3 Python/BestScore.py');
    $output = shell_exec($command);
    echo  "<h2> Best Scores </h2>";
    echo "<table class='content'>\n\n";
    $f = fopen($directory. "Best_scores.csv", "r");
    while (($line = fgetcsv($f)) !== false) {
      echo "<tr>";
      foreach ($line as $cell) {
        echo "<td>" . htmlspecialchars($cell) . "</td>";
      }
      echo "</tr>\n";
    }
    fclose($f);
    echo "\n</table>";

    $command = escapeshellcmd('python3 Python/WorstScore.py');
    $output = shell_exec($command);
    echo  "<h2> Worst Scores </h2>";
    echo "<table class='content'>\n\n";
    $f = fopen($directory. "Worst_scores.csv", "r");
    while (($line = fgetcsv($f)) !== false) {
      echo "<tr>";
      foreach ($line as $cell) {
        echo "<td>" . htmlspecialchars($cell) . "</td>";
      }
      echo "</tr>\n";
    }
    fclose($f);
    echo "\n</table>";
  ?>
  

  <script type="text/javascript" src="js/main.js"></script>

</body>
</html>