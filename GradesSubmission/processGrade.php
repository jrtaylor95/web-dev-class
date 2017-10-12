<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grades to Submit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="mainstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <?php
        require_once("functions.php");
        require_once("Student.php");

        if (!isset($_POST["submit"])) {
          $sanitized_self = htmlspecialchars($_SERVER["PHP_SELF"]);

          $students = unserialize($_SESSION[$_SESSION["courseSection"]]);
          $student_table_body = "";

          foreach ($students as $name => $student) {

            if (isset($_POST["optradio_$name"])) {
              $student->setGrade($_POST["optradio_$name"]);
            }
            $grade = $student->getGrade();
            $student_table_body .= <<<TBODY
              <tr>
                <td>$name</td>
                <td>$grade</td>
              </tr>
TBODY;
          }

          $_SESSION[$_SESSION['courseSection']] = serialize($students);

          $body = <<<BODY
          <h1>Grades to Submit</h1>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Grade</th>
                </tr>
              </thead>
              <tbody>
                $student_table_body
              </tbody>
            </table>

            <form class="horizontal-form" action="$sanitized_self" method="post">
              <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                  <button type="submit" class="btn btn-default" name="submit">Submit Grades</button>
                </div>
                <div class="col-xs-offset-2 col-xs-10">
                  <button class="btn btn-default" name="back">Back</button>
                </div>
              <div>
            </form>
BODY;
        } else {
          $body = <<<BODY
          <h1>Grades submitted and e-mail confirmation sent</h1>
          <br></br>
          <h1>This is submission #1</h1>
BODY;
        }
        echo $body;

        if (isset($_POST["back"])) {
          header("Location: gradeSubmission.php");
        }
      ?>
    </div>
  </body>
</html>
