<?php
  require_once("support.php");
  require_once("sql.php");

  $self = sanitize($_SERVER["PHP_SELF"]);
  $email = "";
  $error_login_failed = false;
  
  if (isset($_POST["login"])) {
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];

    $db_connection = new mysqli(DB_HOST,DB_USER, DB_PASS, DB_DATABASE);
    if ($db_connection->connect_error) {
      die($db_connection->connect_error);
    }

    if (verifyPassword($db_connection, $email, $password)) {
      $result = select($db_connection, $email);
      $row = $result->fetch_array(MYSQLI_ASSOC);

      $header = "Application found in the database with the following values:";
      $name = $row['name'];
      $gpa = $row['gpa'];
      $year = $row['year'];
      $gender = $row['gender'];

      include("templates/template_review.php");
    } else {
      $error_login_failed = true;
      $password = "";

      include("templates/template_login.php");
    }
    $db_connection->close();
  } else if (isset($_POST["return"])) {
    header("location: index.php");
  } else {
    include("templates/template_login.php");
  }
?>
