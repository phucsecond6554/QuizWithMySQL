<?php
  require('lib/Question_Set.php');
  require('lib/Question.php');

  $qs_model = new Question_Set();
  $question_model = new Question();

  $qs_list = $qs_model->get_where(); // Lay toan bo Question_Set
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Question Set List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
    integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
    crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center">Cac bo question set hien co</h1>
    <table class="table table-striped">
      <tr>
        <th>ID</th>
        <th>Ten bo de</th>
        <th>So cau hoi</th>
        <th>Them cau hoi</th>
      </tr>

      <?php foreach($qs_list as $value){ ?>
        <tr>
          <td><?php echo $value['id']; ?></td>
          <td><?php echo $value['name']; ?></td>
          <td>
            <?php
              $total_question = count($question_model->get_where('question_set = '.$value['id'])); // Dem tong so cau hoi
              echo $total_question;
             ?>
          </td>
          <td><a href="<?php echo 'New_Question_new.php?QS='.$value['id'] ?>">Them cau hoi</a></td>
        </tr>
      <?php } ?>
    </table>

    <a href="New_QS.php" class="btn btn-primary">Them question set</a>
  </body>
</html>
