var mode = "add"; // Them hoac sua cau hoi
var edit_url = ""; // Url khi edit quesiton

function print_list(result){
  //var json = JSON.parse(result);

  var html = "<tr>";
  html += "<th>Cau hoi</th>";
  html += "<th>Sua </td>";
  html += "<th>Xoa</th>";

  $.each(result['data'], function(key, item){
    html += "<tr>";
    html += "<td>" + item['question'] + "</td>";
    html += "<td><a class ='btn btn-warning edit_btn' href='proccess/Edit_Question.php?id=" + item['id'] +"'>Edit</a></td>";
    html += "<td><a class ='btn btn-danger delete_btn' href='proccess/Delete_Question.php?id=" + item['id'] +"'>Delete</a></td>";
    html += "</tr>";
    console.log(item['question']);
  });

  $("#question_table").html(html);
} // Function print_list in ra list cau hoi ben phai

function add_question(){

  var myform = document.getElementById("question_form");
    var fd = new FormData(myform);

    $.ajax({
        url: "http://localhost/QuizWithMySQL/Admin/proccess/New_Question_New.php",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(result){
          var json = JSON.parse(result);

          var html = "<tr>";
          html += "<th>Cau hoi</th>";
          html += "<th>Sua </td>";
          html += "<th>Xoa</th>";

          $.each(json.data, function(key, item){
            html += "<tr>";
            html += "<td>" + item.question + "</td>";
            html += "<td><a class ='btn btn-warning edit_btn' href='proccess/Edit_Question.php?id=" + item.id +"'>Edit</a></td>";
            html += "<td><a class ='btn btn-danger delete_btn' href='proccess/Delete_Question.php?id=" + item.id +"'>Delete</a></td>";
            html += "</tr>";
            //console.log(item['question']);
          });

          $("#question_table").html(html);
          alert("Them cau hoi thanh cong");
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
    success : print_list
  });
} // Function delete_question

function get_question(url){
  $.ajax({
    url : url,
    dataType : "json",
    type : "get",
    success: function(result){
      $("#question").val(result['question'][0]['question']);
      var index = 0;

      $.each(result['answer'] , function(key, item){
        if(item['is_right'] == true){
          $("#right_answer").val(item['answer']);
        } // Neu cau tra loi la dung
        else {
          $(`.wrong_answer:eq(${index})`).val(item['answer']);
          index += 1;
        }
      });
    }
  });
} // Function get_question

function edit_question(url){

    var myform = document.getElementById("question_form");
    var fd = new FormData(myform);
    var button = document.getElementById("add_btn");
    fd.append("add_question", button);

    $.ajax({
        url: url,
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(result){
          var json = JSON.parse(result);

          var html = "<tr>";
          html += "<th>Cau hoi</th>";
          html += "<th>Sua </td>";
          html += "<th>Xoa</th>";

          $.each(json.data, function(key, item){
            html += "<tr>";
            html += "<td>" + item.question + "</td>";
            html += "<td><a class ='btn btn-warning edit_btn' href='proccess/Edit_Question.php?id=" + item.id +"'>Edit</a></td>";
            html += "<td><a class ='btn btn-danger delete_btn' href='proccess/Delete_Question.php?id=" + item.id +"'>Delete</a></td>";
            html += "</tr>";
            //console.log(item['question']);
          });

          $("#question_table").html(html);

          alert("Sua cau hoi thanh cong");
        }
    });
}; // Function edit_question

/*function delete_dom_btn(){
  $("#question_table").on("click", ".delete_btn", function(event){
    event.preventDefault();

    if(confirm("Ban co chac la muon xoa")){
      delete_question($(this).attr("href"));
    }
  }); // Nut delete
} // Add event delete button

function edit_dom_btn(){
  $("#question_table").on("click", ".edit_btn" , function(event){
    event.preventDefault();

    get_question($(this).attr("href"));

    if(mode != "edit"){
      $("#title").text("Chinh sua cau hoi");
      var cancel_btn = $("<button></button>");
      $(cancel_btn).text("Cancel");
      $(cancel_btn).attr("id", "cancel_btn");
      $(cancel_btn).attr("class", "btn btn-default");

      $("#question_form").append(cancel_btn);

      mode = "edit";
    }


  }); // Nut edit
} */// Add event edit button

$(document).ready(function(){
  $("#add_btn").click(function(event){
    event.preventDefault();

    if(mode == "add"){
      add_question();
    }else {
      edit_question(edit_url);
    }
  });//Khi submit them cau hoi hoac chinh sua cau hoi

  $("#question_table").on("click", ".delete_btn", function(event){
    event.preventDefault();

    if(confirm("Ban co chac la muon xoa")){
      delete_question($(this).attr("href"));
    }
  }); // Nut delete

  $("#question_table").on("click", ".edit_btn" , function(event){
    event.preventDefault();

    edit_url = $(this).attr("href"); // Cap nhat url de edit

    get_question($(this).attr("href"));

    if(mode != "edit"){
      $("#title").text("Chinh sua cau hoi");
      $("#add_btn").text("Chinh sua");
      var cancel_btn = $("<button></button>");
      $(cancel_btn).text("Cancel");
      $(cancel_btn).attr("id", "cancel_btn");
      $(cancel_btn).attr("class", "btn btn-default");

      $("#question_form").append(cancel_btn);

      mode = "edit";
    }
  }); // Nut edit

  $("#question_form").on("click", "#cancel_btn", function(event){
    event.preventDefault();
    $("#title").text("Them cau hoi");
    $("#add_btn").text("Them cau hoi");
    $("#cancel_btn").remove();

    mode = "add";
  });
});
