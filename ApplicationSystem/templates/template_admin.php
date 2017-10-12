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
      <h1>Applications</h1>
      <form class="form-horizontal" action="<?php echo $self ?>" method="post">
        <div class="form-group col-xs-12">
          <label class="control-label" for="display"><h2>Select fields to display</h2></label>
          <select class="form-control" id="display" name="display[]" multiple>
            <option value="name">name</option>
            <option value="email">email</option>
            <option value="gpa">gpa</option>
            <option value="year">year</option>
            <option value="gender">gender</option>
          </select>
        </div>
        <div class="form-group col-xs-12">
          <label class="control-label" for="sort"><h2>Select field to sort applications</h2></label>
          <select class="form-control" id="sort" name="sort">
            <option value="name">name</option>
            <option value="email">email</option>
            <option value="gpa">gpa</option>
            <option value="year">year</option>
            <option value="gender">gender</option>
          </select>
        </div>
        <div class="form-group col-xs-12">
          <label class="control-label" for="filter"><h2>Filter Condition</h2></label>
          <input type="text" class="form-control" id="filter" name="filter">
        </div>
        <div class="form-group col-xs-12">
            <button class="btn btn-default" name="admin_submit">Display Applications</button>
            <button class="btn btn-default" name="return">Return to main menu</button>
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
