<?php
  require_once('Admin/lib/Question_Set.php');

  $qs_model = new Question_Set();

  $qs_data = $qs_model->get_where(); // Lay danh sach Question_Set
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
      <tr>
        <th>ID</th>
        <th>Ten bo question set</th>
        <th>Di den  question set</th>
      </tr>

      <?php foreach($qs_data as $value){ ?>
        <tr>
          <td><?php echo $value['id']; ?></td>
          <td><?php echo $value['name'] ?></td>
          <td><a href="#">Bla</a></td>
        </tr>
      <?php } ?>
    </table>
  </body>
</html>
