<?php
  require_once('Admin/lib/Question.php');
  require_once('Admin/lib/Question_Set.php');
  require_once('Admin/lib/Answer.php');
  session_start();

  unset($_SESSION['question']); // Reset lai cau hoi va cau tra loi
  unset($_SESSION['answer']);

  if(isset($_GET['QS'])){
    $question_set = $_GET['QS'];
  }else {
    die('Chon question set phu hop');
  }

  $question_model = new Question();
  $answer_model = new Answer();
  $question_set_model = new Question_Set();

  $question_data = $question_model->get_where('question_set = '.$question_set,'rand()');

  if(count($question_data) == 0){
    die('Hien tai bo de chua co cau hoi');
  }

  foreach($question_data as $qs_data){
    $_SESSION['question'][] = $qs_data; // Lay question data
    $_SESSION['answer'][] = $answer_model->get_where('question_id = '. $qs_data['id'], 'rand()'); // Lay cau tra loi
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>
      <?php
        $qs_name = $question_set_model->get_where('id = '.$question_set);
        echo 'Bo de: '.$qs_name[0]['name'];
      ?>
    </h1>
    <form action="Result.php" method="post">
      <?php
        $data_length = count($_SESSION['question']); // Dem tong so cau hoi

        for($i = 0 ; $i < $data_length ; $i++){ // In cau hoi
      ?>
        <h5><?php echo 'Cau hoi '.($i+1).': '. $_SESSION['question'][$i]['question'] ?></h5>

        <?php foreach($_SESSION['answer'][$i] as $answer){ // Cau tra loi?>
          <input type="radio" name="<?php echo $i?>" value="<?php echo $answer['id'] ?>">
          <i><?php echo $answer['answer'] ?></i><br>
        <?php } // IN cau tra loi ?>

      <?php } // IN ra cau hoi?>

      <input type="submit" name="" value="Nop bai">
    </form>
  </body>
</html>
