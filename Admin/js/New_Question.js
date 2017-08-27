function add_question(){
  var myform = document.getElementById("question_form");
    var fd = new FormData(myform );
    $.ajax({
        url: "http://localhost/QuizWithMySQL/Admin/proccess/New_Question_New.php",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (result) {
            var json = JSON.parse(result);

            var html = "<tr>";
            html += "<th>Cau hoi</th>";
            html += "<th>Sua </td>";
            html += "<th>Xoa</th>";

            $.each(json.data, function(key, item){
              html += "<tr>";
              html += "<td>" + item.question + "</td>";
              html += "<td><a class ='btn btn-warning' href='Edit.php?id=" + item.id +"'>Edit</a></td>";
              html += "<td><a class ='btn btn-danger delete_btn' href='proccess/Delete_Question.php?id=" + item.id +"'>Delete</a></td>";
              html += "</tr>";
              console.log(item['question']);
            });

            $("#question_table").html(html);
        }
    });
}; // Function add_question

/*function add_question(){
  //var form = document.getElementById("question_form");
  var formdata = new FormData();
  formdata.append("Name", "Phuc dep trai");
  var xhr = new XMLHttpRequest();

  xhr.open("POST", "http://localhost/QuizWithMySQL/Admin/proccess/test.php");

  xhr.onreadystatechange = function(){
    console.log(xhr.status + " - " + xhr.readyState);
    console.log(xhr.response);
  }

  xhr.send(formdata);
}*/

function delete_question(delete_url){
  $.ajax({
    url : delete_url,
    type : "GET",
    dataType : 'json',
    data:{
      question_set : $("#question_set").val()
    },
    success : function(result){
      //var json = JSON.parse(result);

      //console.log(result);

      var html = "<tr>";
      html += "<th>Cau hoi</th>";
      html += "<th>Sua </td>";
      html += "<th>Xoa</th>";

      $.each(result['data'], function(key, item){
        html += "<tr>";
        html += "<td>" + item['question'] + "</td>";
        html += "<td><a class ='btn btn-warning' href='Edit.php?id=" + item['id'] +"'>Edit</a></td>";
        html += "<td><a id='delete_btn' class ='btn btn-danger' href='proccess/Delete_Question.php?id=" + item['id'] +"'>Delete</a></td>";
        html += "</tr>";
        console.log(item['question']);
      });

      $("#question_table").html(html);
    }
  });
}

$(document).ready(function(){
  $("#add_btn").click(function(event){
    event.preventDefault();
    add_question();
  });//Khi submit them cau hoi

  $("#question_table").on("click", "a", function(event){
    event.preventDefault();
    delete_question($(this).attr("href"));
  });
});
