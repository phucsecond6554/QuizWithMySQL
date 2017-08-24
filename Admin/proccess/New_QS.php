<?php
  // Cai nay dung de them Question set
  require('../lib/Question_Set.php');

  $qs = new Question_Set(); // Bien ket noi toi table Question_Set

  if($_GET['add_qs']){
    $data = array(
      'name' => $_GET['qs_name']
    ); // Du lieu them vao

    if ($qs->create($data)) {
      echo 'Thanh cong';
    }else {
      echo 'That bai';
    }
  }
 ?>
