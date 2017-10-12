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

  if (isset($_POST["application_submit"])) {
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
    }

    $db_connection = new mysqli(DB_HOST,DB_USER, DB_PASS, DB_DATABASE);
    if ($db_connection->connect_error) {
      die($db_connection->connect_error);
    }

    if (!checkIfEmailUnique($db_connection, $email)) {
      $error_email = true;
    }

    if ($error_password || $error_email) {
      include("templates/template_application.php");
    } else {
      $result = insert($db_connection, $name, $email, $gpa, $year, $gender, $password);

      if (!$result) {
    		die("Insertion failed: " . $db_connection->error);
    	} else {
        $header = "The following entry has been added to the database";
    		include("templates/template_review.php");
    	}
      $db_connection->close();
    }
  } else if (isset($_POST["return"])) {
    header("location: index.php");
  } else {
    include("templates/template_application.php");
  }
?>
