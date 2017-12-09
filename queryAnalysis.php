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
            <div class="card col-md-8 offset-md-2 text-center" style="padding-top: 30px;border-radius: 10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.30);">
            <div class="a1">
                                <div class="input-field col-md-12 ">
                                    <label> The Number of Ticket that sold in each of Event : </label><br>
                                    <?php   
                                    $con = new mysqli("localhost", "root", "", "booking_db");
                                    $sql=mysqli_query($con,"SELECT eventName,Count(OrderDetail.orderNo) as count 
                                    FROM Event, assignlocation,Tier, orderDetail
                                    Where event.eventID = assignlocation.EventID and assignlocation.TierNo= tier.TierNo and tier.TierNo=orderdetail.TierNo
                                    Group By event.EventID
                                    ORDER BY count DESC
                                    ");

                                    $outp = '<table class="table" border=2><tr><td>eventName</td><td>Count</td>';
                                    while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
                                    {	$outp .= '<tr>';
                                        $outp .= '<td>'.$rs['eventName'].'</td>';
                                        $outp .= '<td>'.$rs['count'].'</td>';
                                        $outp .= '</tr>';
                                    }
                                    $outp .= '</table>';
                                    echo $outp;
                                    ?><br>
                                </div>
                    </div>
                    <div class="a2">
                                <div class="input-field col-md-12">
                                    <label> Maximizing number of eventtype created by each organizerID : </label><br>
                                    <table>
                                    <?php   
                                    $con = new mysqli("localhost", "root", "", "booking_db");
                                    $sql=mysqli_query($con,"SELECT OrganizerID,TypeName, MAX(count) as Count
                                            FROM (
                                            SELECT COUNT(TypeName) as count
                                            FROM organizer,event,eventtype
                                            WHERE organizer.RegID = event.RegID and event.TypeID = eventtype.TypeID
                                            GROUP by OrganizerID) AS count,organizer,event,eventtype
                                            WHERE organizer.RegID = event.RegID and event.TypeID = eventtype.TypeID
                                            GROUP by OrganizerID
                                    ");
                                    $outp = '<table class="table" border=2><tr><td>OrganizerID</td><td>TypeName</td><td>Count</td>';
                                    while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
                                    {	$outp .= '<tr>';
                                        $outp .= '<td>'.$rs['OrganizerID'].'</td>';
                                        $outp .= '<td>'.$rs['TypeName'].'</td>';
                                        $outp .= '<td>'.$rs['Count'].'</td>';
                                        $outp .= '</tr>';
                                    }
                                    $outp .= '</table>';
                                    echo $outp;
                                    ?>
                                    </table><br>
                                </div>
                    </div>
                    <div class="a3">
                                <div class="input-field col-md-12">
                                    <label> The number of Ticket that sold in each of EventType : </label><br>
                                    <?php   
                                    $con = new mysqli("localhost", "root", "", "booking_db");
                                    $sql=mysqli_query($con,"SELECT TypeName,Count(OrderDetail.orderNo) as count
                                    From Event, assignlocation,Tier, orderDetail,eventtype
                                    Where eventtype.TypeID=event.TypeID and event.eventID = assignlocation.EventID and assignlocation.TierNo= tier.TierNo and tier.TierNo=orderdetail.TierNo
                                    Group By TypeName
                                    ORDER BY count DESC
                                    ");

                                    $outp = '<table class="table" border=2><tr><td>TypeName</td><td>Count</td>';
                                    while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
                                    {	$outp .= '<tr>';
                                        $outp .= '<td>'.$rs['TypeName'].'</td>';
                                        $outp .= '<td>'.$rs['count'].'</td>';
                                        $outp .= '</tr>';
                                    }
                                    $outp .= '</table>';
                                    echo $outp;
                                    ?><br>
                                </div>
                    </div>
                    <div class="a4">
                                <div class="input-field col-md-12">
                                    <label> The most location used : </label><br>
                                    <?php   
                                    $con = new mysqli("localhost", "root", "", "booking_db");
                                    $sql=mysqli_query($con,"SELECT l.LocationName, Count(a.EventID) AS Times
                                    FROM location l , assignlocation a
                                    WHERE l.LocationID =a.LocationID
                                    Group BY l.LocationID
                                    ");

                                    $outp = '<table class="table" border=2><tr><td>Location</td><td>Times</td>';
                                    while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
                                    {	$outp .= '<tr>';
                                        $outp .= '<td>'.$rs['LocationName'].'</td>';
                                        $outp .= '<td>'.$rs['Times'].'</td>';
                                        $outp .= '</tr>';
                                    }
                                    $outp .= '</table>';
                                    echo $outp;
                                    ?><br>
                                </div>
                    </div>
                    <div class="a5">
                                <div class="input-field col-md-12">
                                    <label> Event Profit : </label><br>
                                    <?php   
                                    $con = new mysqli("localhost", "root", "", "booking_db");
                                    $sql=mysqli_query($con,"SELECT eventName,SUM(Totalpaid) as Profit
                                    FROM event, assignlocation,orderdetail,`order` 
                                    WHERE event.EventID = assignlocation.EventID and assignlocation.TierNo = orderdetail.TierNO and orderdetail.OrderNo = `order`.orderNO
                                    GROUP BY eventName
                                    ");

                                    $outp = '<table class="table" border=2><tr><td>EventName</td><td>Profit</td>';
                                    while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
                                    {	$outp .= '<tr>';
                                        $outp .= '<td>'.$rs['eventName'].'</td>';
                                        $outp .= '<td>'.$rs['Profit'].'</td>';
                                        $outp .= '</tr>';
                                    }
                                    $outp .= '</table>';
                                    echo $outp;
                                    ?><br>
                                </div>
                    </div>
                    <div class="a6">
                                <div class="input-field col-md-12">
                                    <label> The number of Each Month BirthDay user of each EventType : </label><br>
                                    <?php   
                                    $con = new mysqli("localhost", "root", "", "booking_db");
                                    $sql=mysqli_query($con,"SELECT TypeName,Month(BirthDate) as Month,COUNT(BirthDate) as CountMonth
                                    FROM user,`order`,orderdetail,assignlocation,event,eventtype
                                    WHERE event.TypeID = eventtype.TypeID and event.EventID = assignlocation.EventID AND assignlocation.TierNo = orderdetail.TierNo and orderdetail.OrderNo = `order`.OrderNo and `order`.`UserID`=user.UserID
                                    GROUP BY Month(BirthDate)
                                    ");

                                    $outp = '<table class="table" border=2><tr><td>TypeName</td><td>Month</td><td>Count</td>';
                                    while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
                                    {	$outp .= '<tr>';
                                        $outp .= '<td>'.$rs['TypeName'].'</td>';
                                        $outp .= '<td>'.$rs['Month'].'</td>';
                                        $outp .= '<td>'.$rs['CountMonth'].'</td>';
                                        $outp .= '</tr>';
                                    }
                                    $outp .= '</table>';
                                    echo $outp;
                                    ?><br>
                                </div>
                    </div>
	
                    
                    <div class="a7">
                        <div class="input-field col-md-12">                    
                        <label> The number of each gender who buy the ticket of user from each EventType : </label><br>
                        <?php
                        
                            //query
                            $sql=mysqli_query($con,"SELECT TypeName,Gender,COUNT(gender) as Count
                            FROM user,`order`,orderdetail,assignlocation,event,eventtype
                            WHERE event.TypeID = eventtype.TypeID and event.EventID = assignlocation.EventID AND assignlocation.TierNo = orderdetail.TierNo and orderdetail.OrderNo = `order`.OrderNo and `order`.`UserID`=user.UserID
                            GROUP BY Gender;");
                                    
                            $outp = '<table class="table" border=2>';
                            $outp .= '<tr><td>TypeName</td><td>Gender</td><td>Count</td>';
                            while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
                            {	$outp .= '<tr>';
                                $outp .= '<td>'.$rs['TypeName'].'</td>';
                                $outp .= '<td>'.$rs['Gender'].'</td>';
                                $outp .= '<td>'.$rs['Count'].'</td>';
                                $outp .= '</tr>';
                            }
                            $outp .= '</table>';
                        echo $outp;
                    ?><br>
                    </div>

	</div>

	<div class="a8">
    <div class="input-field col-md-12">
		<label> The number of each job from user of each EventType : </label><br>
		<?php
		$con = new mysqli("localhost", "root", "", "booking_db");  
                                    //query
            $sql=mysqli_query($con,"SELECT TypeName,JobName,COUNT(JobName) as Count
            FROM user,`order`,orderdetail,assignlocation,event,eventtype,occupation
            WHERE event.TypeID = eventtype.TypeID and event.EventID = assignlocation.EventID AND assignlocation.TierNo = orderdetail.TierNo and orderdetail.OrderNo = `order`.OrderNo and `order`.`UserID`=user.UserID and user.JobID = occupation.JobID
            GROUP BY JobName;");
		
			$outp = '<table class="table" border=2>';
			$outp .= '<tr><td>TypeName</td><td>Job</td><td>Count</td>';
			while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
			{	$outp .= '<tr>';
				$outp .= '<td>'.$rs['TypeName'].'</td>';
				$outp .= '<td>'.$rs['JobName'].'</td>';
				$outp .= '<td>'.$rs['Count'].'</td>';
				$outp .= '</tr>';
			}
			$outp .= '</table>';
		echo $outp;
	
   ?><br>
    </div>
	</div>
	<div class="a9">
    <div class="input-field col-md-12">
		<label> The number of event created by each organizer : </label><br>
		<?php
		$con = new mysqli("localhost", "root", "", "booking_db");  
                                    //query
		$sql=mysqli_query($con,"SELECT OrganizerID,COUNT(eventID) as Count
        FROM organizer,event
        WHERE organizer.RegID = event.RegID
        GROUP BY organizer.OrganizerID");
		
			$outp = '<table class="table" border=2>';
			$outp .= '<tr><td>OrganizerID</td><td>Count</td>';
			while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
			{	$outp .= '<tr>';
				$outp .= '<td>'.$rs['OrganizerID'].'</td>';
				$outp .= '<td>'.$rs['Count'].'</td>';
				
				$outp .= '</tr>';
			}
			$outp .= '</table>';
		echo $outp;
	
   ?><br>
    </div>
	</div>

	<div class="a10">
    <div class="input-field col-md-12">
		<label> AVG of Day Duration of EventTime of each eventType : </label><br>
		<?php
		$con = new mysqli("localhost", "root", "", "booking_db");  
                                    //query
		$sql=mysqli_query($con,"SELECT TypeName,AVG(DayDuration) as Avg FROM
            (SELECT DATEDIFF(EndEventDate,StartEventDate) as DayDuration
            FROM event,eventtype
            WHERE event.TypeID = eventtype.TypeID) as duration,eventtype,event
            WHERE event.TypeID = eventtype.TypeID
            GROUP BY TypeName");
		
			$outp = '<table class="table" border=2>';
			$outp .= '<tr><td>TypeName</td><td>AVG(day)</td>';
			while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
			{	$outp .= '<tr>';
				$outp .= '<td>'.$rs['TypeName'].'</td>';
				$outp .= '<td>'.$rs['Avg'].'</td>';
				
				$outp .= '</tr>';
			}
			$outp .= '</table>';
		echo $outp;
	
   ?><br>
    </div>
	</div>

	<div class="a11">
    <div class="input-field col-md-12">
		<label>  The number of Order each period time(hours)  : </label><br>
		<?php
		$con = new mysqli("localhost", "root", "", "booking_db");  
                                    //query
		$sql=mysqli_query($con,"SELECT HOUR(OrderDate) as Hours, Count(UserID) as Count
        FROM `order`
        GROUP BY Hours");
		
			$outp = '<table class="table" border=2>';
			$outp .= '<tr><td>Time during</td><td>Count</td>';
			while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
			{	$outp .= '<tr>';
				$outp .= '<td>'.$rs['Hours'].'</td>';
				$outp .= '<td>'.$rs['Count'].'</td>';
				
				$outp .= '</tr>';
			}
			$outp .= '</table>';
		echo $outp;
	
   ?><br>
    </div>
	</div>

	<div class="a12">
    <div class="input-field col-md-12">
		<label> The number of order of each userID : </label><br>
		<?php
		$con = new mysqli("localhost", "root", "", "booking_db");  
                                    //query
		$sql=mysqli_query($con,"SELECT u.UserID as UserID,count(o.OrderNo) As CountOrder
        FROM `order` o,`user`u
        WHERE o.UserID = u.UserID
        GROUP BY u.UserID");
		
			$outp = '<table class="table" border=2>';
			$outp .= '<tr><td>Time during</td><td>Count</td>';
			while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
			{	$outp .= '<tr>';
				$outp .= '<td>'.$rs['UserID'].'</td>';
				$outp .= '<td>'.$rs['CountOrder'].'</td>';
				
				$outp .= '</tr>';
			}
			$outp .= '</table>';
		echo $outp;
	
   ?><br>
    </div>
	</div>
            </div>
            </div>
    <script>
        $(document).ready(function () {
            checkstatus();

            $('#logoutBtn').click(function(){
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