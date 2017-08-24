<?php
  require_once('Admin/lib/Question.php');
  require_once('Admin/lib/Answer.php');

  $question_set = 7;

  $question_model = new Question();
  $answer_model = new Answer();

  $question_data = $question_model->get_where('question_set = 7');
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="Result.php" method="post">
      <?php foreach($question_data as $question){?>
        <h5><?php echo $question['question'] ?></h5>

        <ul>
          <?php
              $answer_data = $answer_model->get_where('question_id = '.$question['id'], 'rand()');

              foreach($answer_data as $answer){
          ?>
            <li>
              <input type="radio" name="<?php echo $question['id']?>" value="<?php echo $answer['id']?>">
              <?php echo $answer['answer'] ?>
            </li>
          <?php  } ?>
        </ul>
      <?php } // Question?>

      <input type="submit" name="" value="Nop bai">
    </form>
  </body>
</html>
