<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
		integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
		crossorigin="anonymous">

		<style media="screen">
			fieldset{
				margin-top: 15px;
				box-shadow: 5px 5px 2px #888888;
				padding: 5px;
			}

			input[type=submit], button{
				margin-top: 30px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<form action="proccess/New_Question.php" method="post">

				<div id="form-block">
					<fieldset>
						<legend>Question 1</legend>
						<div class="Question_Block">
							<div class="Answer_Block" id="QS_1">
								<div class="form-group">
									<label>Question</label>
									<input type="text" name="q1" class="form-control">
								</div>

								<div class="form-group">
									<label>Cau tra loi dung</label>
									<input type="text" name="a1_right" class="form-control">
								</div>

								<div class="form-group">
									<label>Cau tra loi con lai</label>
									<input type="text" name="a1[]" class="form-control">
								</div>
							</div> <!--Answer Block-->
							<button type="button" class="Add_Answer_Btn btn btn-primary" btn-target="QS_1">Them cau tra loi</button>
						</div> <!--Question Block-->
					</fieldset>
				</div> <!--Form Block -->

				<input type="hidden" name="Question_Set" value="<?php echo $_GET['QS'] ?>">

				<input type="submit" class="btn btn-default" value="Submit">
			</form>

			<button type="button" name="button" id="new_btn">Them cau hoi</button>
		</div> <!--Container-->


	</body>

	<script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>


	<script>
		var current_question = 1; // Cau hoi hien tai

		function add_answer(index, item){
			let target = $(item).attr("btn-target"); // Lay muc tieu cua nut

			let answer_name = "a" + (index + 1) + "[]";
			let answer_template = `<div class="form-group">
				<label>Cau tra loi con lai</label>
				<input type="text" name="${answer_name}" class="form-control">
			</div>`;

			$("#" + target).append(answer_template);
			console.log("Bla");
		} // Function add_answer
///////////////////////////////////////////////

	$(".Add_Answer_Btn").each(function(index, item){
		$(item).click(function(){
			add_answer(index, item);
		});
	}); // Them mot cau tra loi moi

		add_answer();

		$("#new_btn").click(function(){
			current_question += 1;
			let answer_block_id = "QS_" + current_question;
			let q_id = "q" + current_question;
			let right_answer_name = "a" + current_question + "_right";
			let anwser_name = "a" + current_question + "[]";
			let target = "QS_" + current_question;

			var qs_template = `<fieldset>
			<legend>Question ${current_question} </legend>
			<div class="Question_Block">
				<div class="Answer_Block" id="${answer_block_id}">
					<div class="form-group">
						<label>Question</label>
						<input type="text" name="${q_id}" class="form-control">
					</div>

					<div class="form-group">
						<label>Cau tra loi dung</label>
						<input type="text" name="${right_answer_name}" class="form-control">
					</div>

					<div class="form-group">
						<label>Cau tra loi con lai</label>
						<input type="text" name="${anwser_name}" class="form-control">
					</div>
				</div>
				<button type="button" class="Add_Answer_Btn btn btn-primary" btn-target="${target}">Them cau tra loi</button>
			</div> </fieldset>`;

			$("#form-block").append(qs_template);

			let new_item = $(".Add_Answer_Btn");

			$(new_item[current_question - 1]).click(function(){
				add_answer(current_question - 1, new_item[current_question - 1]);
			});
		});


	</script>
</html>
