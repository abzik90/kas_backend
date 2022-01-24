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
var dataToSend2={
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
var dataToSend3={
  "surname": "Tsoy",
  "name": "Maxim",
  "midname": "",
  "iin": "011121600900",
  "city": "Nursultan",
  "street": "Kabanbay batyr ave",
  "homeNum": "53/24",
  "flatNum": "806",
  "cadastral": "45465656598989898",
  "area": "30",
  "latitude":["78.79555","78.79557","78.79555","78.79557"],
  "longitude":["43.79555","43.79557","43.79555","43.79557"],
  "additional":"No additional info"
}
var dataToSend={
  "surname":"Bizhigit",
  "name":"Nurbol",
  "midname":"",
  "iin":"010101200500",
  "city":"Nur-Sultan (Astana)",
  "street":"Máńgilik El dańǵyly",
  "homeNum":"С4/6",
  "flatNum":"",
  "cadastral":"454545454545",
  "area":"1.4531",
  "datePublished":"2022-01-24",
  "additional":"lorem ipsum",
  "latitude":[51.08870296580983,51.086946144162305,51.0880948428312,51.088844860014895],
  "longitude":[71.41216501339377,71.4148579512447,71.41512617214623,71.41396745785175]};
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
