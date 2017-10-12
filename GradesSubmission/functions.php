<?php
  require("Student.php");

  $valid_loginID = "cmsc298s";
  $valid_password = "terps";

  function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
  }

  function check_credentials($loginID, $password) {
    $valid_loginID = $GLOBALS['valid_loginID'];
    $valid_password = $GLOBALS['valid_password'];

    return $loginID === $valid_loginID && $password === $valid_password;
  }

  function get_students($file_name) {
    $students = array();

    $file = fopen($file_name, "r") or die("File Does Not Exist");

    while (!feof($file)) {
      $line = fgets($file);

      $student = new Student(sanitize($line));

      $students[$student->getName()] = $student;
    }
    fclose($file);

    return $students;
  }
?>
