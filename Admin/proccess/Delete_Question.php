<?php
require('../lib/Question.php');
require('../lib/Answer.php');

$question_model = new Question();
$answer_model = new Answer();

if(isset($_GET['id'])){
  $id = $_GET['id'];
}else {
  die();
}

$answer_model->delete_where('question_id = '.$id); // Xoa cac cau tra loi cua cau hoi do
$question_model->delete_where('id = '.$id);

$new_data = $question_model->get_where('question_set = '.$_GET['question_set']); // Lay lai danh sach cau hoi

echo json_encode(array('data' => $new_data));
 ?>
