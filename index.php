<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>encounters</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div>
      <h2>What's the DB?</h2>
      <?php
        // In this example, important values are stored in plaintext.
        // Don't do this in live production! Instead, these values are
        // usually stored as environmental variables some place safe.
        $dbname = "dm-screen";
        $dbuser = "dm-screen-user";
        $dbpass = "Anorak@Get!Ready!21";

        //opens a new mysqli connection (the preferred method today)
        $mysqli = new mysqli("localhost", $dbuser, $dbpass, $dbname);

        /* check connection */
        if ($mysqli->connect_errno) {
            printf("<p class=\"error\">Connect failed: %s</p>", $mysqli->connect_error);
            exit();
        }
        else {
          echo "<p class=\"success\">You're connected to the " . $dbname . " database. Have a nice day 😃</p>";
        }
      ?>
      <hr />
    </div>
    <div>
      <h2>Display All Entries</h2>
        <?php
          echo "<table>";//start table
          //creating our table heading
          echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>From</th>";
            echo "<th>To</th>";
            echo "<th>CR</th>";
            echo "<th>Encounter</th>";
          echo "</tr>";
          $con = new mysqli("localhost", $dbuser, $dbpass, $dbname);
          $call = "SELECT id, start, stop, cr, encounter FROM encsewer";
          $answer = $con->query($call);
          while ($line = $answer->fetch_array(MYSQLI_ASSOC)) {
            echo "<tr>";
              echo "<td>" . $line["id"] . "</td>";
              echo "<td>" . $line["start"] . "</td>";
              echo "<td>" . $line["stop"] . "</td>";
              echo "<td>" . $line["cr"] . "</td>";
              echo "<td>" . $line["encounter"] . "</td>";
            echo "</tr>";
        }
        // end table
        echo "</table>";
        ?>
        <hr />
    </div>
    <div id="encounter">
      <?php
        if(array_key_exists('generate', $_POST)) {
            generate();
        }
        function generate() {
          $random = rand("0", "100");
          echo "You encounter " . $random;
        }
    ?>
    <form method="post">
      <button name="generate">Generate</button>
    </form>
    </div>
  </body>
</html>
