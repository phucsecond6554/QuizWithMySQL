<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add New Question Set</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
    integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
    crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1 class="text-center">Them moi 1 Question Set</h1>
      <form action="proccess/New_QS.php" method="get">
        <div class="form-group">
          <label for="qs_name">Ten question set</label>
          <input type="text" name="qs_name" placeholder="Nhap ten Question Set" class="form-control">
        </div>
        <input type="submit" name="add_qs" value="Add new" class="btn btn-primary">
      </form>
    </div>
  </body>
</html>
