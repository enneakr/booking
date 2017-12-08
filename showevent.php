<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<style>
h1 {
border-bottom: 3px solid #cc9900;
color: #996600;
font-size: 30px;
}                               
table, th , td {
border: 1px solid grey;
border-collapse: collapse;
padding: 5px;
}
table tr:nth-child(odd) {
background-color: #f1f1f1;
}
table tr:nth-child(even) {
background-color: #ffffff;
} 
</style>
</head>
<body>
<h1>All Event</h1>
<div id="id01"></div>
<script>
var xmlhttp = new XMLHttpRequest();
var url = "getevent.php";

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myArr = JSON.parse(this.responseText);
        myFunction(myArr);
    }
};
xmlhttp.open("GET", url, true);
xmlhttp.send();

function myFunction(arr) {
    var out = "<table>";
    var i;
    for(i = 0; i < arr.length; i++) {
        out += "<div id='div1'><tr><td>" + 
        arr[i].EventID +
        "</td><td>" +
        arr[i].EventName +
        "</td><td>" +
        arr[i].StartEventDate+
        "</td><td>" +
        arr[i].EndEventDate+
        "</td><td>" +
        arr[i].StartEventTime+
        "</td><td>" +
        arr[i].EndEventTime+
        "</td><td>" +
        arr[i].Description +
        "</td><td><button type='button' data-target='#edit' id='div11' class='update' data-uid="+arr[i].EventID+" >READ MORE</button></td></tr></div>";
    }
    out += "</table>";
    document.getElementById("id01").innerHTML = out;
}

     $(document).ready(function(){
        $(".update").click(function(){
        var id = $(this).data("uid");
        location.href = "showEventDesP.php?EventID="+id;
        });
});
</script>
</head>
<body>



</script>
</body>
</html>
