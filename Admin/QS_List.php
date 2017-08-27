<?php
  require('lib/Question_Set.php');

  $qs = new Question_Set();

  $qs_list = $qs->get_where(); // Lay toan bo Question_Set
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Question Set List</title>
  </head>
  <body>
    <table>
      <tr>
        <th>ID</th>
        <th>Ten bo de</th>
        <th>Them cau hoi</th>
      </tr>

      <?php foreach($qs_list as $value){ ?>
        <tr>
          <td><?php echo $value['id']; ?></td>
          <td><?php echo $value['name']; ?></td>
          <td><a href="<?php echo 'New_Question_new.php?QS='.$value['id'] ?>">Them cau hoi</a></td>
        </tr>
      <?php } ?>
    </table>
  </body>
</html>
