<?php   
    include ("db/database.php");  
    session_start();
    echo " ";
    $regid = $_SESSION['login_org'];
    $sql=mysqli_query($con,"SELECT e.EventID as EventID, e.EventName as EventName, org.RegID,StartEventDate, EndEventDate,StartEventTime , EndEventTime ,ET.TypeName as EventType,isCancel
    FROM organizer org,event e,eventtype et
    where org.RegID=e.RegID AND org.RegID=$regid AND et.TypeID=e.TypeID");

    $outp = '<br>
    <h3>Event Management</h3><table class="table"><tr><td> Event </td><td> Start Date </td><td> End Date </td><td> Start Time </td><td> End Time </td><td> Type </td><td> Cancel? </td><td></td>';
    while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
    {   
        $rs['isCancel'] = ($rs['isCancel'])?"Yes":"No";
        $outp .= '<tr>';
        $outp .= '<td>'.$rs['EventName']."</td>";
        $outp .= '<td>'.$rs['StartEventDate'].'</td>';
        $outp .= '<td>'.$rs['EndEventDate'].'</td>';
        $outp .= '<td>'.$rs['StartEventTime'].'</td>';
        $outp .= '<td>'.$rs['EndEventTime'].'</td>';
        $outp .= '<td>'.$rs['EventType'].'</td>';
        $outp .= ($rs['isCancel'] == "Yes")? '<td>'.$rs['isCancel'].'</td>' :'<td><button type="button" class="btn btn-danger" id="cancelEvent" onclick="cancel('.$rs['EventID'].')">cancel</button></td>';
        $outp .= '</tr>';
        }
    $outp .= '</table><br><hr>';
    echo $outp;
?>