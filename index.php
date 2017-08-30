<?php
  require('Admin/lib/Question_Set.php');
  require('Admin/lib/Question.php');

  $qs_model = new Question_Set();
  $question_model = new Question();

  $qs_data = $qs_model->get_where(); // Lay danh sach Question_Set
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Quiz</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
    integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
    crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center">Simple Quiz with PHP and MySQL</h1>
    <table class="table table-striped">
      <tr>
        <th>ID</th>
        <th>Ten question set</th>
        <th>Tong so cau hoi</th>
        <th>Lam quiz</th>
      </tr>

      <?php foreach($qs_data as $value){ ?>
        <tr>
          <td><?php echo $value['id']; ?></td>
          <td><?php echo $value['name'] ?></td>
          <td>
            <?php
              $total_question = count($question_model->get_where('question_set = '.$value['id']));
              echo $total_question;
             ?>
          </td>
          <td><a href="<?php echo 'Question.php?QS='.$value['id'] ?>".>Lam quiz</a></td>
        </tr>
      <?php } ?>
    </table>
  </body>
</html>
