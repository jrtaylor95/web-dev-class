<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="mainstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <header>
    <div class="container">
      <img src="images/umdLogo.gif">
    </div>
  </header>
  <body>
    <div class="container">
      <form class="form-horizontal" action="<?php echo $self ?>" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2 col-xs-12" for="name">Name:</label>
          <div class="col-sm-5 col-xs-12">
            <input type="text" class="form-control" id="name" name="name" maxlength="50" value="<?php echo $name ?>">
          </div>
        </div>
        <div <?php echo $error_email ? 'class="form-group has-error has-feedback"' : 'class="form-group"' ?>>
          <label class="control-label col-sm-2" for="email">Email:</label>
          <div class="col-sm-5">
            <input type="email" class="form-control" id="email" name="email" maxlength="100" value="<?php echo $email ?>">
            <?php echo $error_email ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : "" ?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2 col-xs-12" for="gpa">GPA:</label>
          <div class="col-sm-1 col-xs-4">
            <input type="number" step=".01" class="form-control" id="gpa" name="gpa" maxlength="4" value="<?php echo $gpa ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2 col-xs-12">Year:</label>
          <div class="col-sm-10 col-xs-12">
            <label class="radio-inline"><input type="radio" name="optradio_year" value="10" <?php echo $year == 10 ? "checked" : "" ?>>10</label>
            <label class="radio-inline"><input type="radio" name="optradio_year" value="11" <?php echo $year == 11 ? "checked" : "" ?>>11</label>
            <label class="radio-inline"><input type="radio" name="optradio_year" value="12" <?php echo $year == 12 ? "checked" : "" ?>>12</label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2 col-xs-12">Gender:</label>
          <div class="col-sm-10 col-xs-12">
            <label class="radio-inline"><input type="radio" name="optradio_gender" value="M" <?php echo strcmp($gender, "M") == 0 ? "checked" : "" ?>>M</label>
            <label class="radio-inline"><input type="radio" name="optradio_gender" value="F" <?php echo strcmp($gender, "F") == 0 ? "checked" : "" ?>>F</label>
          </div>
        </div>
        <div <?php echo $error_password ? 'class="form-group has-error has-feedback"' : 'class="form-group"' ?>>
          <label class="control-label col-sm-2 col-xs-12" for="password">Password:</label>
          <div class="col-sm-4 col-xs-12">
            <input type="password" class="form-control" id="password" name="password" maxlength="50" value="<?php echo $password ?>">
            <?php echo $error_password ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : "" ?>
          </div>
        </div>
        <div <?php echo $error_password ? 'class="form-group has-error has-feedback"' : 'class="form-group"' ?>>
          <label class="control-label col-sm-2 col-xs-12" for="verify_password">Verify Password:</label>
          <div class="col-sm-4 col-xs-12">
            <input type="password" class="form-control" id="verify_password" name="verify_password" maxlength="50" value="<?php echo $verify ?>">
            <?php echo $error_password ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : "" ?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-5 col-xs-12">
            <button class="btn btn-default" name="application_submit">Submit Data</button>
            <button class="btn btn-default" name="return">Return to main menu</button>
          </div>
        </div>
      </form>
    </div>
  </body>
  <footer>
    <div class="container">
      <p>If you have any questions about our program, please contact the system administrator at <a href="mailto:jrtaylor@terpmail.umd.edu">jrtaylor@terpmail.umd.edu</a></p>
    </div>
  </footer>
</html>
