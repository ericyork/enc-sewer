<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>encounters</title>
    <link rel="stylesheet" href="css/style.css">
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
      <ul>
        <?php
          $con = new mysqli("localhost", $dbuser, $dbpass, $dbname);
          $call = "SELECT make, model, year FROM cars";
          $answer = $con->query($call);
          while ($line = $answer->fetch_array(MYSQLI_ASSOC)) {
            echo "<li><strong>" . $line["make"] . " " . $line["model"] . "</strong> (" . $line["year"] . ")" . ". </li>";
          }
          $con -> close();
        ?>
      </ul>
      <hr />
    </div>
  </body>
</html>
