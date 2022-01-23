<html>
<head>
  <title>Testing the API</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
  <input type='button' value='Add Post' id='add'>
  <input type='button' value='Select All' id='select'>
  <input type='button' value='Select Single' id='single'>
  <input type='button' value='Edit' id='edit'>
  <input type='button' value='Delete' id='delete'>
</body>
<script>
var dataToSend={
  "surname":"Testov",
  "name":"Test",
  "midname":"Testovich",
  "iin":"001020500200",
  "city":"Astana",
  "street":"Kabanbay",
  "homeNum":"53/24",
  "flatNum":"1225",
  "cadastral":"787878787878",
  "area":"20",
  "latitude":['78.79555','78.79557','78.79555','78.79557'],
  "longitude":['43.79555','43.79557','43.79555','43.79557'],
  "additional":"Some additional info"
}
console.log(dataToSend);
$(document).ready(function(){
  $("#add").on('click',function(){
    $.ajax({
       url: "./create/",
       type: "POST",
       // contentType: "application/json; charset=utf-8",
       dataType:'json',
       data: dataToSend,
       success: function(data){
            alert("success");
             },
     });
  });
});
$(document).ready(function(){
  $("#select").on('click',function(){
    $.ajax({
       url: "./select/",
       type: "GET",
       // contentType: "application/json; charset=utf-8",
       // data: dataToSend,
       // dataType:'json'
       success: function(data){
            alert("success");
             },
     });
  });
});
$(document).ready(function(){
  $("#single").on('click',function(){
    $.ajax({
       url: "./select/",
       type: "POST",
       // contentType: "application/json; charset=utf-8",
       data: {
         "target_id":'1'
       },
       dataType:'json',
       success: function(data){
         console.log(data);
            // alert("success");
         },
     });

  });
});
$(document).ready(function(){
  $("#edit").on('click',function(){
    dataToSend["aid"]="2";
    dataToSend["name"]="Ivan";
    $.ajax({
       url: "./edit/",
       type: "POST",
       // contentType: "application/json; charset=utf-8",
       data: dataToSend,
       dataType:'json',
       success: function(data){
            alert("success");
         },
     });
  });
});
$(document).ready(function(){
  $("#delete").on('click',function(){
    $.ajax({
       url: "./delete/",
       type: "POST",
       // contentType: "application/json; charset=utf-8",
       data: {
         "aid":"2"
       },
       dataType:'json',
       success: function(data){
            alert("success");
         },
     });
  });
});
</script>
</html>
