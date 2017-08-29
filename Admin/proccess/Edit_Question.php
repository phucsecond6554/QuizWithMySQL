<?php
  require('../lib/Question.php');
  require('../lib/Answer.php');

  $question_model = new Question();
  $answer_model = new Answer();

  $id = $_GET['id']; // Question id

  $question_data = $question_model->get_where('id = '.$id); // Lay du lieu cau hoi
  $answer_data = $answer_model->get_where('question_id = '.$id); // Lay du lieu cau tra loi

  if(isset($_POST['add_question'])){ // Neu la cap nhat question
    $question_model->update(array('question'=>$_POST['question']) , 'id = '.$id); // Cap nhat cau hoi

    $index = 0;

    foreach($answer_data as $answer){
      if($answer['is_right'] == true){
        $answer_model->update(array('answer'=>$_POST['right_answer']), 'id = '.$answer['id']);
      }// Neu la cau tra loi dung
      else {
        $answer_model->update(array('answer'=>$_POST['answer'][$index]), 'id = '.$answer['id']);
        $index++;
      }
    }

    $new_data = $question_model->get_where('question_set = '.$_POST['question_set']); // Lay lai danh sach cau hoi

    echo json_encode(array('data' => $new_data));

  }else { // Nguoc lai la lay thong tin cau hoi
    die(json_encode(array(
      'question' => $question_data,
      'answer' => $answer_data
    )));
  }
 ?>
