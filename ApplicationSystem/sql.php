<?php
  define("DB_HOST", "localhost");
  define("DB_USER", "dbuser");
  define("DB_PASS", "goodbyeWorld");
  define("DB_DATABASE", "applicationdb");

  function verifyPassword($db_connection, $email, $password) {
    $query = <<<QUERY
      SELECT password
      FROM applicants
      WHERE email = "$email";
QUERY;

    $result = $db_connection->query($query);

    if (!$result) {
      die("Retrieval failed: ". $db_connection->error);
    } else {
      $num_rows = $result->num_rows;

      if ($num_rows == 0) {
        return false;
      } else {
        $result->data_seek(0);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $hash = $row['password'];

        return password_verify($password, $hash);
      }
    }
  }

  function checkIfEmailUnique($db_connection, $email) {
    $query = <<<QUERY
      SELECT email
      FROM applicants
      WHERE email = "$email"
QUERY;

    $result = $db_connection->query($query);

    if (!$result) {
      die("Retrieval failed: ". $db_connection->error);
    } else {
      $num_rows = $result->num_rows;

      if ($num_rows == 0) {
        return true;
      } else {
        return false;
      }
    }
  }

  function insert($db_connection, $name, $email, $gpa, $year, $gender, $password) {
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $query = <<<QUERY
      INSERT INTO applicants
      VALUES ("$name", "$email", $gpa, $year, "$gender", "$hashed")
QUERY;

    return $db_connection->query($query);
  }

  function select($db_connection, $email) {
    $query = <<<QUERY
      SELECT *
      FROM applicants
      WHERE email = "$email"
QUERY;

    return $db_connection->query($query);
  }

  function update($db_connection, $email, $name, $gpa, $year, $gender, $password) {
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $query = <<<QUERY
      UPDATE applicants
      SET name = "$name", gpa = $gpa, year = $year, gender = "$gender", password = "$hashed"
      WHERE email = "$email"
QUERY;

    return $db_connection->query($query);
  }

  function selectAll($db_connection, $fields, $orderBy, $filter = "") {
    $where = $filter ? "WHERE $filter" : "";
    $select = implode(",", $fields);
//     $query = <<<QUERY
//       SELECT $select
//       FROM applicants
//       $where
// QUERY;
    $query = "SELECT $select FROM applicants $where";
    return $db_connection->query($query);
  }

?>
