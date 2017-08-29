<?php
  require('lib/Question.php');
  require('lib/Question_Set.php');

  $qs_model = new Question();
  $question_set_model = new Question_Set();

  if(isset($_GET['QS'])){
    $question_set = $_GET['QS'];
    $question_set_data = $question_set_model->get_where('id = '.$question_set);

    $question_set_name = $question_set_data[0]['name'];
  }else {
    die('Chon sai question set');
  }

  $question_data = $qs_model->get_where('question_set = '.$question_set); // Lay danh sach cau hoi
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
    integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
    crossorigin="anonymous">

    <style media="screen">
      *{
        box-sizing: border-box;
      }

      .question_form{
        border: 1px solid black;
      }

      .question_list{
        border: 1px solid pink;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-7 question_form">
          <form id="question_form" action="index.html" method="post">
            <h1 id="title" class="text-center">Them cau hoi</h1>

            <div class="form-group">
              <label for="Question_Set">Question Set</label>
              <input type="text" value="<?php echo $question_set_name ?>" class="form-control" disabled>
              <input type="hidden" name="question_set" id="question_set" value="<?php echo $question_set ?>">
            </div>

            <div class="form-group">
              <label for="question">Question</label>
              <textarea name="question" id="question" rows="5" cols="80" class="form-control"></textarea>
            </div> <!-- Question-->

            <div class="form-group">
              <label for="answer">Cau tra loi dung</label>
              <input type="text" name="right_answer" id="right_answer" placeholder="Cau tra loi dung" class="form-control">
            </div>

            <div class="form-group">
              <label for="answer">Cau tra loi sai 1</label>
              <input type="text" name="answer[]" placeholder="Cau tra loi sai 1" class="form-control wrong_answer">
            </div>

            <div class="form-group">
              <label for="answer">Cau tra loi sai 2</label>
              <input type="text" name="answer[]" placeholder="Cau tra loi sai 2" class="form-control wrong_answer">
            </div>

            <div class="form-group">
              <label for="answer">Cau tra loi sai 3</label>
              <input type="text" name="answer[]" placeholder="Cau tra loi sai 3" class="form-control wrong_answer">
            </div>

            <button type="button" name="add_question" class="btn btn-primary" id="add_btn">Them cau hoi</button>
          </form>
        </div> <!--Question Form-->

        <div class="col-5 question_list">
          <h1 class="text-center">Danh sach cau hoi</h1>

          <table class="table" id="question_table">
            <tr>
              <th>Cau hoi</th>
              <th>Sua</th>
              <th>Xoa</th>
            </tr>

            <?php foreach($question_data as $question){ ?>
              <tr>
                <td><?php echo $question['question'] ?></td>
                <td><a href="<?php echo 'proccess/Edit_Question.php?id='.$question['id'] ?>" class="btn btn-warning edit_btn">Edit</a></td>
                <td><a href="<?php echo 'proccess/Delete_Question.php?id='.$question['id'] ?>" class="btn btn-danger delete_btn">Delete</a></td>
              </tr>
            <?php } ?>
          </table>
        </div> <!--Bang cau hoi-->
      </div> <!-- Row -->
    </div> <!--Contrainer-->

    <script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous">
    </script>

    <script src="js/New_Question.js"></script>
  </body>
</html>
