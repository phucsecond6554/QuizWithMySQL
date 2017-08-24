<?php
  require('../lib/Question.php');
  require('../lib/Answer.php');

  if(!isset($_POST['Question_Set'])){
    die('Chon sai question set');
  }else {
    $question_set = $_POST['Question_Set'];
  }

  $question = new Question();
  $answer = new Answer();

  $max_id = ($question->get_max_id() == null) ? 1 : $question->get_max_id(); // Lay max id cua question



  $data_length = floor(count($_POST) / 3); // Co 3 truong du lieu


  for($i = 0 ; $i < $data_length ; $i++){
    $max_id += 1; // Id moi

    $question_data = array(
      'id' => $max_id,
      'question' => $_POST['q'.($i + 1)],
      'question_set' => $question_set
    );

    $question->create($question_data); // Them cau hoi vao bang

    foreach($_POST['a'.($i+1)] as $answer_value){
      $answer_data = array(
        'answer' => $answer_value,
        'question_id' => $max_id
      );

      $answer->create($answer_data);
    } // Vong lap de du cau tra loi sai vao bang

    $answer->create(array(
      'answer' => $_POST['a' . ($i + 1) .'_right'],
      'question_id' => $max_id,
      'is_right' => true
    )); // Them cau tra loi dung vao bang
  }

 ?>
