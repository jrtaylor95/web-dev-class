<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="mainstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php
      function sanitize($data) {
        return htmlspecialchars(stripslashes(trim($data)));
      }

      if (isset($_POST['submit'])) {
        $lastName = sanitize($_POST['lastName']);
        $firstName = sanitize($_POST['firstName']);
        $email = sanitize($_POST['email']);

        if (isset($_POST['optradio'])) {
          $shipper = $_POST['optradio'];
        } else {
          $shipper = "";
        }
        if (isset($_POST['softwares'])) {
          $softwares = $_POST['softwares'];
        } else {
          $softwares = array('');
        }
        $specs = nl2br(sanitize($_POST['specifications']));

        $table = "";
        if (isset($_POST['softwares'])) {
        $table = <<<EOT
        <table class="table">
          <thead>
            <tr>
              <th>Software</th>
              <th>Cost</th>
            </tr>
          </thead>
          <tbody>
EOT;
        $totalCost = 0;
        foreach ($softwares as $software) {
          list($name, $cost) = explode(',', $software, 2);
          $totalCost += intval($cost);
          $table .= <<<EOT
          <tr>
            <td>$name</td>
            <td>$cost</td>
          </tr>
EOT;
        }
        $table .= <<<EOT
        </tbody>
        <tfoot>
          <tr>
            <td>Total</td>
            <td>$totalCost</td>
          </tr>
        </tfoot>
        </table>
EOT;
        }
        $body = <<<EOT
          <div class="container">
            <h1>Order Confirmation</h1>
            <div class="row">

              <label class="col-md-2 col-xs-6">Last Name:</label>
              <p class="col-md-1 col-xs-6">$lastName</p>
              <label class="col-md-2 col-xs-6">First Name:</label>
              <p class="col-md-1 col-xs-6">$firstName</p>
              <label class="col-md-1 col-sm-6 col-xs-12">Email:</label>
              <p class="col-md-1 col-sm-6 col-xs-12">$email</p>
              <span class="col-md-4"></span>
            </div>
            <div class="row">
              <label class="col-md-2 col-xs-6">Shipping Method:</label>
              <p class="col-md-1 col-xs-6">$shipper</p>
              <span class="col-md-9"></span>
            </div>
            <div class="row">
              <label class="col-xs-12">Software Order:</label>
              <div class="col-sm-4 col-xs-12">
                $table
              </div>
              <span class="col-sm-8"></span>
            </div>
            <div class="row">
              <label class="col-xs-12">Order Specifications:</label>
              <p class="col-xs-12 text-italic">$specs</p>
            </div>
          </div>
EOT;
        echo $body;
      }
    ?>
  </body>
</html>
