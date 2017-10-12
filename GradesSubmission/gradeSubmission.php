<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grades Submission Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="mainstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <h1>Grades Submission Form</h1>
      <?php
        require_once("functions.php");
        require_once("Student.php");

        if (!isset($_SESSION["course"])) {
          $course = sanitize($_POST['course']);
          $section = sanitize($_POST['section']);
          $_SESSION['course'] = $course;
          $_SESSION['section'] = $section;

          $courseSection = "";
          if(isset($course) && isset($section)) {
            $courseSection = $course.$section;
          }
          $_SESSION["courseSection"] = $courseSection;
          $file_name = $courseSection.".txt";
          $students = get_students($file_name);
          $_SESSION[$courseSection] = serialize($students);

        } else {
          $course = $_SESSION['course'];
          $section = $_SESSION['section'];

          $courseSection = $_SESSION["courseSection"];
          $students = unserialize($_SESSION[$courseSection]);
        }

        $student_form = "";
        foreach ($students as $name => $student) {
          $is_A = strcmp($student->getGrade(), "A") == 0 ? "checked" : "";
          $is_B = strcmp($student->getGrade(), "B") == 0 ? "checked" : "";
          $is_C = strcmp($student->getGrade(), "C") == 0 ? "checked" : "";
          $is_D = strcmp($student->getGrade(), "D") == 0 ? "checked" : "";
          $is_F = strcmp($student->getGrade(), "F") == 0 ? "checked" : "";
          $student_form .= <<<STUDENT
            <div class="form-group row">
              <label class="control-label col-sm-2 col-xs-12" name="$name">$name</label>
              <div class="col-sm-10 col-xs-12">
                <label class="radio-inline"><input type="radio" name="optradio_$name" value="A" required $is_A>A</label>
                <label class="radio-inline"><input type="radio" name="optradio_$name" value="B" required $is_B>B</label>
                <label class="radio-inline"><input type="radio" name="optradio_$name" value="C" required $is_C>C</label>
                <label class="radio-inline"><input type="radio" name="optradio_$name" value="D" required $is_D>D</label>
                <label class="radio-inline"><input type="radio" name="optradio_$name" value="F" required $is_F>F</label>
              </div>
            </div>
STUDENT;
        }
        $body = <<<BODY

          <h1>Course: $course Section: $section</h1>
          <form class="form-horizontal" action="processGrade.php" method="post">
            $student_form
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10 col-xs-12">
                <button type="submit" class="btn btn-default" name="continue">Continue</button>
              </div>
            </div>
          </form>
BODY;

        echo $body;
      ?>
    </div>
  </body>
</html>
