<?php   
    include ("db/database.php");  
    $sql=mysqli_query($con,"SELECT e.EventID as EventID, e.EventName as EventName,StartEventDate, EndEventDate,StartEventTime , EndEventTime ,et.TypeName as EventType,isCancel
    FROM event e,eventtype et
    where isCancel=False AND Month(StartEventDate) >= Month(CURRENT_DATE) AND Month(StartEventDate) <= Month(CURRENT_DATE) AND et.TypeID=e.TypeID");

    $outp = '<br>
    <h3>Recently Event</h3><br><table class="table"><tr><td> Event </td><td> Start Date </td><td> Start Time </td><td> Type </td><td></td>';
    while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC))
    {   
        $rs['isCancel'] = ($rs['isCancel'])?"Yes":"No";
        $outp .= '<tr>';
        $outp .= '<td>'.$rs['EventName']."</td>";
        $outp .= '<td>'.$rs['StartEventDate'].'</td>';
        $outp .= '<td>'.$rs['StartEventTime'].'</td>';
        $outp .= '<td>'.$rs['EventType'].'</td>';
        $outp .= '<td><button type="button" class="btn btn btn-outline-success" id="showEvent" onclick="show('.$rs['EventID'].')">more info</button></td>';
        $outp .= '</tr>';
        }
    $outp .= '</table><br><hr>';
    echo $outp;
?>