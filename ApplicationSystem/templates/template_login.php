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
          <label class="control-label col-sm-3 col-xs-12" for="email">Email associated with application:</label>
          <div class="col-sm-7 col-xs-12">
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3 col-xs-12" for="password">Password associated with application:</label>
          <div class="col-sm-7 col-xs-12">
            <input type="password" class="form-control" id="password" name="password">
          </div>
        </div>
        <?php
          if ($error_login_failed) {
            echo '<div class="alert alert-danger">';
            echo 'No entry exists in the database for the specified email and password';
            echo '</div>';
          }
        ?>
        <div class="form-group">
          <div class="col-sm-offset-3 col-xs-12">
            <button class="btn btn-default" name="login">Submit</button>
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
