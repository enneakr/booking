<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <title>Form PHP MySQL</title>
</head>
<body>
    <div class="container">
        <div class="col-md-7 col-md-offset-2">
        <div class="panel">
        <div class="panel-body">
        <div id="loginform">
            <form action="#" method="post">
                <div id="formlogin" class="newlogin">
                    <div class="row">
                        <div class="input-field col-md-12">
                            <label for="logusername">Username</label><br>
                            <input type="text" id="logusername" name="username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col-md-12">
                            <label for="logpassword">Password</label><br>
                            <input type="password" id="logpassword" name="password">
                        </div>
                    </div>
                    <br>
                    <span class="btn btn-primary sbtn" id="loginBtn">Login</span>
                </div>
                <div id="formlogout" class="newlogin">
                    <span class="btn btn-warning sbtn" id="logoutBtn">Logout</span>
                </div>
                <div id="error"></div>
            </form>
        </div>
    <br><hr><br>
        <div id="registration">
            <form action="#" method="post">
                    <div class="row">
                        <div class="input-field col-md-12">
                            <label for="regusername">Username</label><br> 
                            <input type="text" id="regusername" name="username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col-md-12">
                            <label for="regpassword">Password</label><br>
                            <input type="password" id="regpassword" name="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col-md-12">
                        <label for="regfname">Firstname</label><br>
                            <input type="text" id="regfname" name="firstname">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col-md-12">
                            <label for="reglname">Lastname</label><br>
                            <input type="text" id="reglname" name="lastname">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col-md-12">
                            <label for="regemail">Email</label><br>
                            <input type="email" id="regemail" name="email">
                        </div>
                    </div>
                    <br>
                    <span class="btn btn-primary sbtn" id="regBtn">Register</span>

               
                <div id="output"></div>
            </form>
        </div>
        <!-- <span class="btn btn-info xbtn">Check Status</span> -->
        </div>        
        </div>        
        </div>        
    </div>
    <script>
        $(document).ready(function(){
            checkstatus();
            $('.xbtn').click(function(){
                checkstatus();
            });
            function checkstatus(){
                $.ajax({
                    type:"POST",
                    url: "status.php",
                    success: function(data){
                        console.log(data);
                        if(data['type']=='ACTIVE'){
                            $('#formlogin').hide();
                            $('#formlogout').show();
                        }else{
                            $('#formlogin').show();
                            $('#formlogout').hide();
                        }
                    }
                })
            }
            $('.sbtn').click(function(){
                var btntype = $(this).text();
                var thisForm = this;
                if(btntype == 'Login'){
                    var username = $("#logusername").val();
                    var password = $("#logpassword").val();
                    var dataString = 'username='+username+'&password='+password+'&stype='+btntype;
                }
                if(btntype == 'Logout'){
                    var dataString = 'stype='+btntype;
                }
                if(btntype == 'Register'){
                    var username = $("#regusername").val();
                    var password = $("#regpassword").val();
                    var firstname = $("#regfname").val();   
                    var lastname = $("#reglname").val();
                    var email = $("#regemail").val();                    
                    var dataString = 'username='+username+'&email='+email+'&password='+password+'&firstname='+firstname+'&lastname='+lastname+'&stype='+btntype;
                }
                if(dataString){
                    $.ajax({
                        type: "POST",
                        url: "login.php",
                        data:dataString,
                        datatype:'json',
                        success: function(data){
                            console.log(data);
                            if(data['type'] == 'LOGIN' || data['type'] == 'REMOVED'){
                                checkstatus();
                            }
                            if(data['type'] == 'SUCCESS'){
                                $('#registration').html('An email has been sent, please validate it to log in ');
                            }
                        }
                    });    
                }
            });      
        });
    </script>
</body>
</html>