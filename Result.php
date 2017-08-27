<?php
  require_once('Admin/lib/Answer.php');
  session_start();

  $data_length = count($_SESSION['question']);

  $point = 0;

  for($i = 0 ; $i < $data_length ; $i++){
    foreach($_SESSION['answer'][$i] as $answer){
      if($_POST[$i] == $answer['id'] && $answer['is_right'] == true){
        $point++;
      }
    }
  }

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <style media="screen">
        .wrong{
          color: red;
        }

        .right{
          color: lightgreen;
        }
    </style>
  </head>
  <body>
    <h1>Ban lam dung <?php echo $point ?> cau</h1>

    <?php

    for($i = 0 ; $i < $data_length ; $i++){
      echo 'Cau hoi '.($i + 1).': '.$_SESSION['question'][$i]['question'].'<br>';

      foreach($_SESSION['answer'][$i] as $answer){
        if($_POST[$i] == $answer['id'] && $answer['is_right'] != true){ // Chon sai cau tra loi
          echo "<i class='wrong'>".$answer['answer'].'</i><br>';
        }else if($answer['is_right'] == true){ // Cau hoi dung
          echo "<i class='right'>".$answer['answer'].'</i><br>';
        }else { // Cau hoi sai nhung khong chon
          echo "<i>".$answer['answer'].'</i><br>';
        }
      }
    }
     ?>
  </body>
</html>
