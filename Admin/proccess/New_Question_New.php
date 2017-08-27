<?php
  require('../lib/Question.php');
  require('../lib/Answer.php');

  if(!isset($_POST['question_set'])){
    die('Chon sai question set');
  }else {
    $question_set = $_POST['question_set'];
  } // Kiem tra question set

  $question_model = new Question();
  $answer_model = new Answer();

  $max_id = ($question_model->get_max_id() == null) ? 1 : $question_model->get_max_id(); // Lay max id cua question

  $question_data = array(
    'id' => ($max_id + 1),
    'question' => $_POST['question'],
    'question_set' => $question_set
  ); // Thong tin question

  $question_model->create($question_data); // Them cau hoi vao bang

  foreach($_POST['answer'] as $answer){
    $answer_data = array(
      'answer' => $answer,
      'question_id' => ($max_id + 1)
    );

    $answer_model->create($answer_data);
  } // Them cac cau tra loi sai vao bang

  $right_answer = array(
    'answer' => $_POST['right_answer'],
    'question_id' => ($max_id + 1),
    'is_right' => true
  );

  $answer_model->create($right_answer); // Them cau tra loi dung vao bang

  $new_data = $question_model->get_where('question_set = '.$question_set); // Lay lai danh sach cau hoi

  echo json_encode(array('data' => $new_data));
 ?>
