<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
        crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
    <title>Organizer</title>
</head>

<body>
    <div class="container">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel">
                <div class="panel-body">
                    <div id="loginform">
                        <form action="#" method="post">
                            <div id="formlogin" class="newlogin">
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <h3>Login as organizer</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col-md-12">
                                        <label for="logusername">Username</label>
                                        <br>
                                        <input type="text" class="form-control" id="logusername" name="username">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col-md-12">
                                        <label for="logpassword">Password</label>
                                        <br>
                                        <input type="password" class="form-control" id="logpassword" name="password">
                                    </div>
                                </div>
                                <br>
                                <span class="btn btn-primary sbtn" id="loginBtn">Login</span>
                            </div>
                            <div id="formlogout" class="newlogin">
                                <span class="btn btn-warning sbtn" id="logoutBtn">Logout</span>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" id="editBtn">Edit Profile</button>
                                <span class="btn btn-info sbtn" id="createBtn">Create Event</span>
                            </div>
                            <div id="error"></div>
                        </form>
                    </div>
                    <hr>
                    <br>
                </div>
            </div>
            <div class="panel">
                <div class="panel-body text-center">
                    <div id="application">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Become an organizer</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-md-6">
                                    <label for="regCompany">Company name</label>
                                    <br>
                                    <input type="text" class="form-control" id="regCompany" name="company">
                                </div>
                                <div class="input-field col-md-6">
                                    <label for="regContact">Contact name</label>
                                    <br>
                                    <input type="text" class="form-control" id="regContact" name="contact">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-md-6">
                                    <label for="regEmail">Email</label>
                                    <br>
                                    <input type="email" class="form-control" id="regEmail" name="email">
                                </div>
                                <div class="input-field col-md-6">
                                    <label for="regTel">Phone</label>
                                    <br>
                                    <input type="tel" class="form-control" id="regTel" name="tel">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <label for="regDate">Contact Time</label>
                                    <br>
                                    <input type="text" class="form-control" id="regDate" name="date" placeholder="ex. 5-9pm weekday">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <label for="regNote">Additional Message</label>
                                    <br>
                                    <textarea name="note" id="regNote" class="form-control"></textarea>
                                </div>
                            </div>
                            <br>
                            <span class="btn btn-primary sbtn" id="regBtn">Send Request</span>


                            <div id="output"></div>
                        </form>
                    </div>
                    <div id="createEvent">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Create New Event</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-md-6">
                                    <label for="eventName">Event Title</label>
                                    <br>
                                    <input type="text" class="form-control" id="newEventName" name="eventname">
                                </div>
                                <div class="input-field col-md-6">
                                    <label for="eventType">Event type</label>
                                    <br>
                                    <select class="form-control" id="eventType" name="eventtype">
                                    <option value="Meeting">Meeting</option>
                                    <option value="Technology">Technology</option>
                                    <option value="Music">Music</option>
                                    <option value="Sport">Sport</option>
                                    <option value="Education">Education</option>
                                    <option value="Conference">Conference</option>
                                    <option value="Entertainment">Entertainment</option>
                                    <option value="Workshop">Workshop</option>
                                    <option value="Bussiness">Bussiness</option>
                                    <option value="Other">Other</option>     
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-md-6">
                                    <label for="startDate">Starts</label>
                                    <br>
                                    <input type="date" class="form-control" id="startDate" name="startdate">
                                </div>
                                <div class="input-field col-md-6">
                                    <label for="startTime">Time</label>
                                    <br>
                                    <input type="time" class="form-control" id="startTime" name="starttime">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-md-6">
                                    <label for="endDate">Ends</label>
                                    <br>
                                    <input type="date" class="form-control" id="endDate" name="enddate">
                                </div>
                                <div class="input-field col-md-6">
                                    <label for="endTime">Time</label>
                                    <br>
                                    <input type="time" class="form-control" id="endTime" name="endtime">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <label for="eventDesc">Event Description</label>
                                    <br>
                                    <textarea name="eventdesc" id="eventDesc" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <br>
                                    <h4>Location</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <label for="selectLoc">Select  Location : </label>
                                    <?php
                                    include ("db/database.php");   
                                    //query
                                    $sql=mysqli_query($con,"SELECT LocationID,LocationName FROM location");
                                    if(mysqli_num_rows($sql)){
                                    $select= '<select name="select">';
                                    while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                                          $select.='<option value="'.$rs['LocationID'].'">'.$rs['LocationName'].'</option>';
                                      }
                                    }
                                    $select.='</select>';
                                    echo $select;
                                    ?>
                                </div>
                            </div>
                            <br>
                            <button type="button" class="btn btn-primary" id="createEventBtn">Create</button>
                            
                            <div id="output"></div>
                        </form>
                    </div>
                    <!-- <span class="btn btn-info xbtn">Check Status</span> -->
                    <div id="organizer">
                        <h3>Organizer profile</h3>
                        <div align="left">
                            <div id="profsec"></div>
                            <div id="emailsec"></div>
                            <div id="telsec"></div>
                        </div>
                    </div>
                    <br>
                    <hr>    
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profiile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="edit_org_fb" class="col-form-label">Facebook:</label>
                            <input type="text" class="form-control" id="edit_org_fb">
                        </div>
                        <div class="form-group">
                            <label for="edit_org_line" class="col-form-label">Line:</label>
                            <input type="text" class="form-control" id="edit_org_line">
                        </div>
                        <div class="form-group">
                            <label for="edit_org_web" class="col-form-label">Website:</label>
                            <input type="text" class="form-control" id="edit_org_web">
                        </div>
                        <div class="form-group">
                            <label for="edit_org_desc" class="col-form-label">Description:</label>
                            <textarea class="form-control" id="edit_org_desc" disabled></textarea>
                        </div>
                        <div class="form-group">
                        <div class="form-inline">
                            <input type="email" class="form-control" id="edit_org_email" size=42 placeholder="Email">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-success" id="addEmail">Add</button>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="form-inline">
                            <input type="tel" class="form-control" id="edit_org_tel" size=42 placeholder="Tel">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-success" id="addTel">Add</button>
                            </div>
                        </div>
                        </div>
                        <br>
                        <div id="emailsectest"></div>
                        <div id="telsectest"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeOrg">Close</button>
                    <button type="button" class="btn btn-primary" id="saveOrg">Save</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function delEmail(email) {
            $(document).ready(function () {
                console.log(email);
                var sendDelEmail = 'email=' + email;
                $.ajax({
                    type: "GET",
                    url: "delOrgEmail.php",
                    data: sendDelEmail,
                    datatype: 'json',
                    success: function(data){
                        console.log(data);
                        loadModalEdit();
                    }
                })
            });
        }
        function delTel(tel) {
            $(document).ready(function () {
                console.log(tel);
                var sendDelTel = 'tel=' + tel;
                $.ajax({
                    type: "GET",
                    url: "delOrgTel.php",
                    data: sendDelTel,
                    datatype: 'json',
                    success: function(data){
                        console.log(data);
                        loadModalEdit();
                    }
                })
            });
        }

        function loadModalEdit(){
                var select2 = 'selector=' + 2;
                var select3 = 'selector=' + 3;
                //modal.find('.modal-body input').val();
                $.ajax({
                    type: "POST",
                    url: "getOrg.php",
                    data: select2,
                    datatype: 'json',
                    success: function (data) {
                        console.log(data);
                        var index;
                        var out =
                        "<table><tr><td>Email:</td><td></td></tr>";
                        for (index = 0; index < data.length; index++) {
                            out += "<tr><td>" + data[index]['EmailAddress'] +
                                "</td><td><button type=\"button\" class=\"btn btn-danger\" id=\"delOrgEmail\" onclick=\"delEmail('"+data[index]['EmailAddress']+"')\">Delete</button></td></tr>";
                        }
                        out += "</table>";
                        document.getElementById("emailsectest").innerHTML = out;
                    }
                })
                $.ajax({
                    type: "POST",
                    url: "getOrg.php",
                    data: select3,
                    datatype: 'json',
                    success: function (data) {
                        console.log(data);
                        var index;
                        var out =
                            "<table><tr><td>Tel:</td><td></td></tr>";
                        for (index = 0; index < data.length; index++) {
                            out += "<tr><td>" + data[index]['Tel'] +
                                "</td><td><button type=\"button\" class=\"btn btn-danger\" id=\"delOrgTel\" onclick=\"delTel('"+data[index]['Tel']+"')\" >Delete</button></td></tr>";
                        }
                        out += "</table>"
                        document.getElementById("telsectest").innerHTML = out;
                    }
                })
                
            }        

        $(document).ready(function () {

            checkstatus();
            loadReq();


            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var facebook = button.data('whatever') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                loadModalEdit();
            })

            function loadReq() {
                var select1 = 'selector=' + 1;
                var select2 = 'selector=' + 2;
                var select3 = 'selector=' + 3;
                $.ajax({
                    type: "POST",
                    url: "getOrg.php",
                    data: select1,
                    datatype: 'json',
                    success: function (data) {
                        console.log(data);
                        var out = "<table><tr><td>Organizer ID:</td><td>" + data['OrganizerID'] +
                            "</td></tr>" +
                            "<tr><td>Organizer Company:</td><td>" + data['CompanyName'] +
                            "</td></tr>" +
                            "<tr><td>Organizer Name:</td><td>" + data['ContactName'] + "</td></tr>" +
                            "<tr><td>Description:</td><td>" + data['Description'] + "</td></tr>" +
                            "<tr><td>Facebook:</td><td>" + data['Facebook'] + "</td></tr>" +
                            "<tr><td>Line:</td><td>" + data['Line'] + "</td></tr>" +
                            "<tr><td>Website:</td><td>" + data['Website'] + "</td></tr></table>"
                        document.getElementById("profsec").innerHTML = out;
                    }
                })
                $.ajax({
                    type: "POST",
                    url: "getOrg.php",
                    data: select2,
                    datatype: 'json',
                    success: function (data) {
                        console.log(data);
                        var index;
                        var out =
                            "<table><tr><td>Email:</td><td></td></tr>";
                        for (index = 0; index < data.length; index++) {
                            out += "<tr><td>" + data[index]['EmailAddress'] +
                                "</td><td></td></tr>";
                        }
                        out += "</table>"
                        document.getElementById("emailsec").innerHTML = out;
                    }
                })
                $.ajax({
                    type: "POST",
                    url: "getOrg.php",
                    data: select3,
                    datatype: 'json',
                    success: function (data) {
                        console.log(data);
                        var index;
                        var out =
                            "<table><tr><td>Tel:</td><td></td></tr>";
                        for (index = 0; index < data.length; index++) {
                            out += "<tr><td>" + data[index]['Tel'] +
                                "</td><td></td></tr>";
                        }
                        out += "</table>"
                        document.getElementById("telsec").innerHTML = out;
                    }
                })
            }

            function checkstatus() {
                $.ajax({
                    type: "POST",
                    url: "statusOrg.php",
                    success: function (data) {
                        console.log(data);
                        if (data['type'] == 'ACTIVE') {
                            $('#formlogin').hide();
                            $('#formlogout').show();
                            $('#application').hide();
                            $('#organizer').show();
                            $('#createEvent').hide();
                        } else {
                            $('#formlogin').show();
                            $('#formlogout').hide();
                            $('#application').show();
                            $('#organizer').hide();
                            $('#createEvent').hide();
                        }
                    }
                })
            }
            $('.sbtn').click(function () {
                var btntype = $(this).text();
                if (btntype == "Send Request") {
                    btntype = "Register";
                }
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
                    var company = $("#regCompany").val();
                    var contact = $("#regContact").val();
                    var email = $("#regEmail").val();
                    var tel = $("#regTel").val();
                    var date = $("#regDate").val();
                    var note = $("#regNote").val();
                    var dataString = 'company=' + company + '&contact=' + contact + '&email=' + email +
                        '&tel=' + tel + '&date=' + date + '&note=' + note + '&stype=' + btntype;
                }
                if (dataString) {
                    $.ajax({
                        type: "POST",
                        url: "loginOrg.php",
                        data: dataString,
                        datatype: 'json',
                        success: function (data) {
                            console.log(data);
                            if (data['type'] == 'LOGIN' || data['type'] == 'REMOVED') {
                                checkstatus();
                                loadReq();
                            }
                            if (data['type'] == 'SUCCESS') {
                                $('#application').html(
                                    'An application has been sent, please wait respoding from admin '
                                );
                            }
                        }
                    });
                }
            });
            $('#saveOrg').click(function () {
                var facebook = $("#edit_org_fb").val();
                console.log(facebook);
                var line = $("#edit_org_line").val();
                var website = $("#edit_org_web").val();
                var dataSend = 'facebook=' + facebook + '&line=' + line + '&website=' + website;
                if (dataSend) {
                    $.ajax({
                        type: "POST",
                        url: "editOrg.php",
                        data: dataSend,
                        datatype: 'json',
                        success: function (data) {
                            console.log(data);
                            if (data['type'] == 'SUCCESS') {
                                loadReq();
                                loadModalEdit();
                            }
                        }
                    });
                }
            });
            $('#addEmail').click(function () {
                var email = $("#edit_org_email").val();
                console.log(email);
                var dataAddOrgEmail = 'email='+ email;
                if (dataAddOrgEmail) {
                    $.ajax({
                        type: "POST",
                        url: "addOrgMail.php",
                        data: dataAddOrgEmail,
                        datatype: 'json',
                        success: function (data) {
                            console.log(data);
                            if (data['type'] == 'SUCCESS') {
                                loadReq();
                                loadModalEdit();
                            }
                        }
                    });
                }
                loadReq();
                loadModalEdit();
            });
            $('#addTel').click(function () {
                var tel = $("#edit_org_tel").val();
                console.log(tel);
                var dataAddOrgTel = 'tel='+ tel;
                if (dataAddOrgTel) {
                    $.ajax({
                        type: "POST",
                        url: "addOrgTel.php",
                        data: dataAddOrgTel,
                        datatype: 'json',
                        success: function (data) {
                            console.log(data);
                            if (data['type'] == 'SUCCESS') {
                                loadReq();
                                loadModalEdit();
                            }
                        }
                    });
                }
                loadReq();
                loadModalEdit();
            });
            $('#closeOrg').click(function () {
                loadReq();
                loadModalEdit();
            });
            $('#createBtn').click(function () {
                $('#createEvent').show();
            });
        });
    </script>
</body>

</html>