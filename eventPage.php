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
                <a href="#">
                    <button class="btn btn-outline-info" style="margin-right: 5px;" type="button" id="profBtn">Profile</button>
                </a>
                <a href="queryAnalysis.php">
                    <button class="btn btn-outline-info" style="margin-right: 5px;" type="button" id="ordBtn">Analysis</button>
                </a>
                <a href="#">
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
    <?php
        //header("Access-Control-Allow-Origin: *");
        //header("Content-Type: application/json; charset=UTF-8");
        //$x =intval($_GET['x']);
        $conn = new mysqli("localhost", "root", "", "booking_db");
        $eventid=$_GET['EventID'];
        $result = $conn->query("SELECT EventID,EventName,StartEventDate,EndEventDate,StartEventTime,EndEventTime,HeaderUrl,Description 
            FROM event 
            where EventID=$eventid");
        $row = $result->fetch_array(MYSQLI_ASSOC);

        $outp =  '<table class="table">
                <tr><td></td><td class="text-left"><img src="'.$row["HeaderUrl"].'" style="max-width:100%;
                max-height:100%;"></td></tr>
                <tr><td></td><th class="text-left"><h4>'.$row["EventName"].'</h4></th><td></td></tr>
                <tr><td>Start On</td><td>'.$row["StartEventDate"].'</td><td>'.$row["StartEventTime"].'</td></tr>
                <tr><td>Until</td><td>'.$row["EndEventDate"].'</td><td>'.$row["EndEventTime"].'</td></tr>
                <tr><td></td><td class="text-left">'.$row["Description"].'</td></tr></table>';
        
        echo($outp);



            $result = $conn->query("SELECT t.Name as Event,l.LocationName as Location,t.TierNo,t.Price as Price
            FROM  assignlocation a,tier t,event e,location l
            WHERE e.EventID = a.EventID and a.TierNo= t.TierNo and a.locationID=l.locationID and a.eventID=1");


            $outp = '<table class="table">';
            $outp .= '<tr><td></td><th class="text-center"><h5>Ticket</h5></th><td></td><td></td>';
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    
            $outp .= "<tr>";
            $outp .= '<td class="text-left" >' . $row["Event"] . '</td>';
            $outp .= '<td class="text-left" >' . $row["Location"] . '</td>';
            $outp .=  ($row['Price']>0)? '<td class="text-right">' . $row["Price"] . '฿</td>' :'<td class="text-right">Free</td>';
            $outp .= '<td><a href="#" class="btn btn-info btn-md">
            <span class="glyphicon glyphicon-shopping-cart"></span> Add Cart
            </a></td>';
            $outp .= "</tr>";
            }
            $outp .= "</table>";


            echo $outp;

            $conn->close();
            ?>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
    </div>
    </div>
    <script>
        $('#loginBtn').hide();
        $('#logoutBtn').hide();
        $('#orgBtn').hide();
        $('#profBtn').hide();
        $('#ordBtn').hide();
        $('#payBtn').hide();
        $('formlogout').hide();
        $(document).ready(function () {
            checkstatus();

            $('#logoutBtn').click(function () {
                var btntype = $(this).text();
                if (btntype == 'Logout') {
                    var dataString = 'stype=' + btntype;
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
                        }
                    });
                }
            });

            function checkstatus() {
                $.ajax({
                    type: "POST",
                    url: "status.php",
                    success: function (data) {
                        console.log(data);
                        if (data['type'] == 'ACTIVE') {
                            $('#loginBtn').hide();
                            $('#logoutBtn').show();
                            $('#orgBtn').hide();
                            $('#profBtn').show();
                            $('#ordBtn').show();
                            $('#payBtn').show();

                        } else {
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
        });
    </script>
</body>

</html>