<?php
  ini_set('session.use_strict_mode', 1);
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grades Submission System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="mainstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <h1>Grades Submission System</h1>
      <?php
        include "functions.php";
        if (!isset($_SESSION["user"])) {

          $sanitized_self = htmlspecialchars($_SERVER["PHP_SELF"]);

          $body = <<<BODY
            <form class="form-horizontal" action="$sanitized_self" method="post">
              <div class="form-group">
                <label class="control-label col-sm-2 col-xs-12" for="loginID">LoginID:</label>
                <div class="col-sm-10 col-xs-12">
                  <input class="form-control" type="text" id="loginID" name="loginID" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2 col-xs-12" for="password">Password:</label>
                <div class="col-sm-10 col-xs-12">
                  <input class="form-control" type="password" id="password" name="password" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 col-xs-12">
                  <button type="submit" class="btn btn-default" name="submit">Submit</button>
                </div>
              </div>
            </form>
BODY;
          echo $body;
          if (isset($_POST['submit'])) {
            $loginID = $_POST['loginID'];
            $password = $_POST['password'];
            if (check_credentials($loginID, $password)) {
              $_SESSION["user"] = $loginID;
              header('Location: section.php');
            } else {
              echo "<h1>Invalid login information provided</h1>";
            }
          }
      } else {
        header('Location: section.php');
      }

      ?>
    </div>
  </body>
</html>
