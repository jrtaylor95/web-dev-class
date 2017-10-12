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
      <h1><?php echo $header ?></h1>
      <p>Name: <?php echo $name ?></p>
      <p>Email: <?php echo $email ?></p>
      <p>GPA: <?php echo $gpa ?></p>
      <p>Year: <?php echo $year ?></p>
      <p>Gender: <?php echo $gender ?></p>
      <form class="form-horizontal" action="<?php $self ?>" method="post">
        <div class="form-group">
          <div class="col-xs-12">
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
