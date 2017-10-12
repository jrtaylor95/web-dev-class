<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="mainstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container-fluid">
      <h1>Order Request Form</h1>
      <form class="form-horizontal" action="processRequest.php" method="post">
        <div class="form-group row">
          <label class="control-label col-md-2" for="lastName">Last Name:</label>
          <div class="col-md-4">
            <input class="form-control" id="lastName" type="text" name="lastName" required>
          </div>
          <label class="control-label col-md-2" for="firstName">First Name:</label>
          <div class="col-md-4">
            <input class="form-control" id="firstName" type="text" name="firstName" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-2" for="email">Email:</label>
          <div class="col-md-10">
            <input class="form-control" id="email" type="email" name="email" placeholder="example@example.com" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-2 col-xs-12" for="shippingMethod">Shipping Method</label>
          <?php
            include 'shippers.php';

            foreach ($shippers as $shipper) {
              $radio = <<<EOT
                <div class="radio col-md-2 col-xs-6">
                  <label><input type="radio" name="optradio" value="$shipper" required>$shipper</label>
                </div>
EOT;

              echo $radio;
            }
          ?>
        </div>
        <div class="form-group row">
          <label class="control-label col-xs-12" for="softwares">Softwares</label>
          <div class="col-xs-12 text-left">
            <select class="form-control" id="softwares" name="softwares[]" multiple required>
              <?php
                include 'software.php';

                foreach ($softwares as $software => $price) {
                  echo "<option value=\"".$software.",".$price."\">".$software."&nbsp;($".$price.")</option>";
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-xs-12" for="orderSpecifications">Order Specifications</label>
          <div class="col-xs-12">
            <textarea class="form-control" id="specifications" name="specifications" rows="8" cols="80"></textarea>
          </div>
        </div>
        <div class="form-group row col-xs-12">
          <input class="btn btn-default" type="submit" name="submit" value="Submit">
          <input class="btn btn-default" type="reset" name="reset" value="Reset">
        </div>
      </form>
    </div>
  </body>
</html>
