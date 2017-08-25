<?php
$selectNumber = 0;

for($i = 0; $i < (21*86400); $i+=86400){ //86400s == 1 day, loops through coming days

    $timeStamp = time() + $i;
    $theCheckDate = date("Y-m-d",$timeStamp);

    $selectDate = mysqli_query($connect,"SELECT * FROM groupdays WHERE date = '".$theCheckDate."'");

    if(mysqli_num_rows($selectDate) == 0){ //If the date's not in database, output it

        echo('<tr><td>'.date('D d F',$timeStamp).'</td>');

        for($k = 0; $k < 3; $k++){
            echo("<input type='hidden' name=\"hiddeng".$selectNumber."\" value='$timeStamp'>");
            echo('<td><select class="adminSelectBoxG" name="selectg'.$selectNumber.'">');
            echo("<option value=''>LEEG</option>");

            for($t = (9*3600); $t < (23*3600); $t+=1800){
                echo ("<option value=".date("G:i",$t).">".date("G:i",$t)."</option>");
            }
            echo('</select></td>');
            echo('<td><select class="adminSelectBoxG" name="capacity'.$selectNumber.'">');
            for($x = 0; $x < 11; $x++){
                echo('<option value="'.$x.'">'.$x.'</option>');
            }
            $selectNumber++;
        }
    }
}
