<?php
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
$x =intval($_GET['x']);
$conn = new mysqli("localhost", "root", "", "booking_db");

$result = $conn->query("SELECT EventID,EventName,StartEventDate,EndEventDate,StartEventTime,EndEventTime,Description 
    FROM event 
    where EventID=$x");


echo "<table>
<tr>

<th>EventName</th>
<th>Start EventDate</th>
<th>End Event Date</th>
<th>Start Event Time</th>
<th>End Event Time</th>
<th>Description</th>
</tr>";
while($row = $result->fetch_array(MYSQLI_ASSOC)) {
	echo "<tr>";
    echo "<td>" . $row["EventName"] . "</td>";
    echo "<td>" . $row["StartEventDate"] . "</td>";
    echo "<td>" . $row["EndEventDate"] . "</td>";
    echo "<td>" . $row["StartEventTime"] . "</td>";
    echo "<td>" . $row["EndEventTime"] . "</td>";
    echo "<td>" . $row["Description"] . "</td>";
    echo "</tr>";
	}
echo "</table>";



$result = $conn->query("SELECT t.Name as Event,l.LocationName as Location,t.TierNo,t.Price as Price
FROM  assignlocation a,tier t,event e,location l
WHERE e.EventID = a.EventID and a.TierNo= t.TierNo and a.locationID=l.locationID and a.eventID=$x");



    $outp = '<table border=2>';
    $outp .= '<tr><td>Event</td><td>Location</td><td>Price</td>';
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $outp .= "<tr>";
    $outp .= "<td>" . $row['Event'] . "</td>";
    $outp .= "<td>" . $row["Location"] . "</td>";
    $outp .= "<td>" . $row["Price"] . "</td>";
     $outp .= '<td><button type="button">ADD TO CART</button></td>';
    $outp .= "</tr>";
    }
    $outp .= "</table>";


echo $outp;





$conn->close();
?>