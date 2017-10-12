<?php
  require_once("support.php");
  require_once("sql.php");

  $user = '$2y$10$.f.uB4B5oUXSBhOn8GL9zuKumBX6PnjULfBaUkE1dL5MCXUW9ly82';
  $password = '$2y$10$Le7rrTyn7V/HzPr7pakZB..6ZB3qpztqbdoIHiXbX8ugeAKFEUKoC';

  $self = sanitize($_SERVER["PHP_SELF"]);
  if (isset($_POST["admin_submit"])) {
    $fields = $_POST["display"];
    $sort = $_POST["sort"];
    $filter = trim($_POST["filter"]);

    $db_connection = new mysqli(DB_HOST,DB_USER, DB_PASS, DB_DATABASE);
    if ($db_connection->connect_error) {
      die($db_connection->connect_error);
    }

    $result = selectAll($db_connection, $fields, $sort, $filter);

    if (!$result) {
    		die("Retrieval failed: " . $db_connection->error);
    } else {
      $tableRow = "";

      while ($row = $result->fetch_assoc()) {
        $tableData = "";

        foreach ($row as $column => $data) {
          $tableData .= "<td>$data</td>\n";
        }

        $tableRow .= "<tr>$tableData</tr>";
      }

      $tableHeader = "";
      foreach ($fields as $column) {
        $tableHeader .= "<th>$column</th>\n";
      }

      include("templates/template_table.php");
    }
    $db_connection->close();
  } else if (isset($_POST["return"])) {
    header("location: index.php");
  } else {
    if (isset($_SERVER["PHP_AUTH_USER"]) && isset($_SERVER["PHP_AUTH_PW"]) &&
        password_verify($_SERVER["PHP_AUTH_USER"], $user) && password_verify($_SERVER["PHP_AUTH_PW"], $password)) {
          include("templates/template_admin.php");
    } else {
      header('WWW-Authenticate: Basic realm="My Realm"');
      header('HTTP/1.0 401 Unauthorized');
    }
  }
?>
