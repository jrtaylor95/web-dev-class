<?php
  require_once("support.php");
  require_once("sql.php");

  $self = sanitize($_SERVER["PHP_SELF"]);

  $name = "";
  $email = "";
  $gpa = NULL;
  $year = NULL;
  $gender = "";
  $password = "";
  $verify = "";

  $error_password = false;
  $error_email = false;

  $error_login_failed = false;
  if (isset($_POST["login"])) {
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];

    $db_connection = new mysqli(DB_HOST,DB_USER, DB_PASS, DB_DATABASE);
    if ($db_connection->connect_error) {
      die($db_connection->connect_error);
    }

    if (verifyPassword($db_connection, $email, $password)) {
      $result = select($db_connection, $email, $password);
      $row = $result->fetch_array(MYSQLI_ASSOC);

      $name = $row['name'];
      $gpa = floatval($row['gpa']);
      $year = intval($row['year']);
      $gender = $row['gender'];

      include("templates/template_application.php");
    } else {
      $error_login_failed = true;
      $password = "";

      include("templates/template_login.php");
    }
    $db_connection->close();
  } else if (isset($_POST["application_submit"])) {
    $name = sanitize($_POST["name"]);
    $email = sanitize($_POST["email"]);
    $gpa = floatval(sanitize($_POST["gpa"]));
    $year = intval($_POST["optradio_year"]);
    $gender = $_POST["optradio_gender"];
    $password = $_POST["password"];
    $verify = $_POST["verify_password"];

    if (strcmp($password, $verify) != 0 || $password === "" || $verify === "") {
      $password = "";
      $verify = "";
      $error_password = true;
      include("templates/template_application.php");
    } else {
      $db_connection = new mysqli(DB_HOST,DB_USER, DB_PASS, DB_DATABASE);
      if ($db_connection->connect_error) {
        die($db_connection->connect_error);
      }

      $result = update($db_connection, $email, $name, $gpa, $year, $gender, $password);
      if (!$result) {
        die("Insertion failed: " . $db_connection->error);
      } else {
        $header = "The entry has been updated in the database and the new values are:";
        include("templates/template_review.php");
      }
      $db_connection->close();
    }
  } else if (isset($_POST["return"])) {
    header("location: index.php");
  } else {
    include("templates/template_login.php");
  }
?>
