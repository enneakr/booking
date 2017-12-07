<?php
    include ("db/database.php");   
    //query
    $sql=mysqli_query($con,"SELECT LocationID,LocationName FROM location");
    if(mysqli_num_rows($sql)){
    $select= '<select name="loc" id="selectLoc" class="form-control">';
    while($rs=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
            $select.='<option value="'.$rs['LocationID'].'">'.$rs['LocationName'].'</option>';
        }
    }
    $select.='</select>';
    echo $select;
?>