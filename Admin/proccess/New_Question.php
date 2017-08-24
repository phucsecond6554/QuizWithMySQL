<?php
  require('../lib/Question.php');
  require('../lib/Answer.php');

  $question = new Question();
  $anser = new Answer();

  $max_id = ($question->get_max_id() == null) ? 1 : $question->get_max_id(); // Lay max id cua question

  $question_set = isset($_POST['Question_Set']) ? $_POST['Question_Set'] : 1; // Lay question_set

  $data_length = floor(count($_POST) / 3); // Co 3 truong du lieu


  for($i = 0 ; $i < $data_length ; $i++){
    $max_id += 1; // Id moi

    $question_data = array(
      'id' => $max_id,
      'question' => $_POST['q'.($i + 1)],
      'question_set' => $question_set
    );

    $question->create($question_data); // Them cau hoi vao bang

    foreach($_POST['a'.($i+1)] as $answer){
      $answer_data = array(
        'answer' => $answer,
        'question_id' => $max_id,
      );

      $answer->create($answer_data);
    } // Vong lap de du cau tra loi sai vao bang


  }

 ?>
