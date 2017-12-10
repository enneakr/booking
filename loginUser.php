<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
        crossorigin="anonymous">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
    <title>Event Paw</title>
</head>

<body style="margin-bottom: 100px;background-image: linear-gradient(to right top, #051937, #182b6c, #4a379f, #8b36ca, #d812eb);">
    <nav class="navbar navbar-dark bg-dark justify-content-between" style="-webkit-box-shadow: 0 8px 6px -6px #999;
    -moz-box-shadow: 0 8px 6px -6px #999;
    box-shadow: 0 8px 6px -6px #001;height:50px;">
    
       
            <div class="form-group my-auto">
                <a href="loginUser.php">
                    <button class="btn btn-outline-success" style="margin-right: 5px;" type="button" id="loginBtn">Login</button>
                </a>
                <a href="loginUser.php">
                    <button class="btn btn-outline-warning" style="margin-right: 5px;" type="button" id="logoutBtn">Logout</button>
                </a>
                <a href="orgReg.php">
                    <button class="btn btn-outline-info" style="margin-right: 5px;" type="button" id="orgBtn">Organizer</button>
                </a>
                <a href="indev.php">
                    <button class="btn btn-outline-info" style="margin-right: 5px;" type="button" id="profBtn">Profile</button>
                </a>
                <a href="queryAnalysis.php">
                    <button class="btn btn-outline-info" style="margin-right: 5px;" type="button" id="ordBtn">Analysis</button>
                </a>
                <a href="indev.php">
                    <button class="btn btn-outline-info" style="margin-right: 5px;" type="button" id="payBtn">Payment</button>
                </a>
            </div>
            <div class="form-group my-auto">
            <a href="index.php">
                <i class="fa fa-home fa-2x" aria-hidden="true" style="color: #818181;"></i>
            </a>
        </div>
     
        
    </nav>
    <div class="container">
        <div style="margin-top: 50px;"></div>
        <div class="card col-md-8 offset-md-2 text-center" style="border-radius: 10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.30);">
                
                    <div id="loginform">
                        <form action="#" method="post">
                            <div id="formlogin" class="newlogin">
                                <div class="row text-center ">
                                    <div class="col-md-12" style="margin-top: 50px;">
                                        <h3>Login as user</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col-md-12" style="padding: 0rem 10rem 0rem 10rem;margin:1rem 0rem 0rem 0rem">
                                        <label for="logusername">Username</label>
                                        <br>
                                        <input type="text"class="form-control" id="logusername" name="username">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col-md-12" style="padding: 0rem 10rem 0rem 10rem;margin:1rem 0rem 0rem 0rem">
                                        <label for="logpassword">Password</label>
                                        <br>
                                        <input type="password" class="form-control" id="logpassword" name="password">
                                    </div>
                                </div>
                                <br>
                                <a href="index.php"><span class="btn btn-primary sbtn" id="loginBtn">Login</span></a>
                            </div>
                            <div id="formlogout" class="newlogin">
                                <span class="btn btn-warning sbtn" id="logoutBtn">Logout</span>
                            </div>
                            <div id="error"></div>
                        </form>
                    </div>
                    
                    <hr>
                    <br>
                    <div id="registration">
                        <form action="#" method="post">
                        <div class="row">
                                <div class="col-md-12">
                                    <h3>Registration</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <label for="regusername">Username</label>
                                    <br>
                                    <input type="text" class="form-control" id="regusername" name="username">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <label for="regpassword">Password</label>
                                    <br>
                                    <input type="password" class="form-control" id="regpassword" name="password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <label for="regfname">Firstname</label>
                                    <br>
                                    <input type="text" class="form-control" id="regfname" name="firstname">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <label for="reglname">Lastname</label>
                                    <br>
                                    <input type="text" class="form-control" id="reglname" name="lastname">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <label for="regemail">Email</label>
                                    <br>
                                    <input type="email" class="form-control" id="regemail" name="email">
                                </div>
                            </div>
                            <br>
                            <span class="btn btn-success sbtn" id="regBtn">Register</span>


                            <div id="output"></div>
                        </form>
                    </div>
                    <!-- <span class="btn btn-info xbtn">Check Status</span> -->
                <br>
                <hr>  
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#loginBtn').hide();
            $('#logoutBtn').hide();
            $('#orgBtn').hide();
            $('#profBtn').hide();
            $('#ordBtn').hide();
            $('#payBtn').hide();
            $('formlogout').hide();
            checkstatus();
            $('.xbtn').click(function () {
                checkstatus();
            });

            function checkstatus() {
                $.ajax({
                    type: "POST",
                    url: "status.php",
                    success: function (data) {
                        console.log(data);
                        if (data['type'] == 'ACTIVE') {
                            $('#formlogin').hide();
                            $('#formlogout').show();
                            $('#loginBtn').hide();
                            $('#logoutBtn').show();
                            $('#orgBtn').hide();
                            $('#profBtn').show();
                            $('#ordBtn').show();
                            $('#payBtn').show();
                        } else {
                            $('#formlogin').show();
                            $('#formlogout').hide();
                            $('#loginBtn').show();
                            $('#logoutBtn').hide();
                            $('#orgBtn').show();
                            $('#profBtn').hide();
                            $('#ordBtn').hide();
                            $('#payBtn').hide();
                        }
                    }
                })
            }
            $('.sbtn').click(function () {
                var btntype = $(this).text();
                var thisForm = this;
                if (btntype == 'Login') {
                    var username = $("#logusername").val();
                    var password = $("#logpassword").val();
                    var dataString = 'username=' + username + '&password=' + password + '&stype=' +
                        btntype;
                }
                if (btntype == 'Logout') {
                    var dataString = 'stype=' + btntype;
                }
                if (btntype == 'Register') {
                    var username = $("#regusername").val();
                    var password = $("#regpassword").val();
                    var firstname = $("#regfname").val();
                    var lastname = $("#reglname").val();
                    var email = $("#regemail").val();
                    var dataString = 'username=' + username + '&email=' + email + '&password=' +
                        password + '&firstname=' + firstname + '&lastname=' + lastname + '&stype=' +
                        btntype;
                }
                if (dataString) {
                    $.ajax({
                        type: "POST",
                        url: "login.php",
                        data: dataString,
                        datatype: 'json',
                        success: function (data) {
                            console.log(data);
                            if (data['type'] == 'LOGIN' || data['type'] == 'REMOVED') {
                                checkstatus();
                            }
                            if (data['type'] == 'SUCCESS') {
                                $('#registration').html(
                                    'An email has been sent, please validate it to log in '
                                );
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>