<?php
  require_once('Admin/lib/Answer.php');

  $answer_model = new Answer();

  $point = 0;

  foreach($_POST as $answer){
    if($answer_model->check_answer($answer)){
      $point += 1;
    }
  }

  echo $point;
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
