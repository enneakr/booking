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

</head>
<div id="id01"></div>

<script>
	var temp = location.search.substring(1).split("=");
	var x = unescape(temp[1]);
	 	//document.getElementById("id02").innerHTML = x;
		//obj = {"EventID": x};
		//dbParam = JSON.stringify(obj);
	var xmlhttp = new XMLHttpRequest();
	var url = "http://localhost/booking/getEventDes.php?x=";



	xmlhttp.onreadystatechange=function() {
    	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    	document.getElementById("id01").innerHTML= this.responseText;}};
    	
		xmlhttp.open("GET", url+x, true);
		xmlhttp.send(); 
	//===========================================//   

 
	</script>

</html>

