<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Section information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="mainstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <h1>Section Inforamtion</h1>
      <?php
        $body = <<<BODY
          <form class="form-horizontal" action="gradeSubmission.php" method="post">
            <div class="form-group">
              <label class="control-label col-sm-2 col-xs-12" for="course">Course Name:</label>
              <div class="col-sm-10 col-xs-12">
                <input class="form-control" type="text" name="course" id="course" placeholder="e.g. cmsc128" required autofocus>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2 col-xs-12" for="section">Section:</label>
              <div class="col-sm-10 col-xs-12">
                <input class="form-control" type="text" name="section" id="section" placeholder="e.g. 0101" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10 col-xs-12">
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
              </div>
            </div>
          </form>
BODY;

        echo $body;
      ?>
    </div>
  </body>
</html>
