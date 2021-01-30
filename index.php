<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>encounters</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div>
      <h2>Sewer Encounters</h2>
      <?php
        function generate() {
          $dbname = "dm-screen";
          $dbuser = "dm-screen-user";
          $dbpass = "Anorak@Get!Ready!21";
          $random = rand("01", "100");
          $con = new mysqli("localhost", $dbuser, $dbpass, $dbname);
          $call = "SELECT id, start, stop, cr, encounter FROM encsewer";
          $answer = $con->query($call);
          echo "<p>Roll: " . $random . "</p>";
          while ($line = $answer->fetch_array(MYSQLI_ASSOC)) {
            $from = $line["start"];
            $to = $line["stop"];
            if (($from <= $random) && ($to >= $random)) {
              echo "<p>You encounter " . $line["encounter"] . "</p>";
            }
          }
          $con -> close();
        }
      if(array_key_exists('generate', $_POST)) {
          generate();
      }
    ?>
    <form method="post">
      <button name="generate">Generate</button>
    </form>
    </div>
  </body>
</html>
