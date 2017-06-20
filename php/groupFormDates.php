<?php

//Doesnt get used

$groupDays = mysqli_query($connect,"SELECT * FROM groupdays");
$days = mysqli_fetch_array($groupDays);

for($timestamp = time(); $timestamp < time() + (7*86400); $timestamp+=86400){

    if(date('W') == date('W',$timestamp)) {

        if (date('N', $timestamp) == 2 || date('N', $timestamp) == 6 || date('N', $timestamp) == 7) {
            //No lessons on tuesday, saturday and sunday
        } else {
            if(date('N',$timestamp) == 1){

                $date1 = date('Y-m-d',$timestamp);
                $time1 = date('H:i:s',strtotime('15:45'));
                $dateTimeValue = date('Y-m-d H:i:s',strtotime($date1.' '.$time1));

                $time2 = date('H:i:s',strtotime('16:45'));
                $dateTimeValue2 = date('Y-m-d H:i:s',strtotime($date1.' '.$time2));

                if($days['monday1']){
                    echo "<tr><td colspan='2'>".date('l d F', $timestamp)."</td>";
                    echo '<td class="halfTd"><input required class="radioButton" type="radio" name="dateTime" value="'.$dateTimeValue.'">&nbsp; 15:45</td>';
                }
                if($days['monday2']){
                    if(!$days['monday1']){
                        echo "<tr><td colspan='2'>".date('l d F', $timestamp)."</td>";
                    }
                    echo '<td class="halfTd"><input required type="radio" class="radioButton" name="dateTime" value="'.$dateTimeValue2.'">&nbsp; 16:45 </td></tr>';
                }
            }elseif(date('N',$timestamp) == 3){

                $date1 = date('Y-m-d',$timestamp);
                $time1 = date('H:i:s',strtotime('13:45'));
                $dateTimeValue = date('Y-m-d H:i:s',strtotime($date1.' '.$time1));

                if($days['wednesday']){
                    echo "<tr><td colspan='2'>".date('l d F', $timestamp)."</td>";
                    echo ' <td class="halfTd"><input required type="radio" class="radioButton" name="dateTime" value="'.$dateTimeValue.'"> &nbsp;13:45 </td>';
                }
            }elseif(date('N',$timestamp) == 4){

                $date1 = date('Y-m-d',$timestamp);
                $time1 = date('H:i:s',strtotime('16:30'));
                $dateTimeValue = date('Y-m-d H:i:s',strtotime($date1.' '.$time1));

                if($days['thursday']){
                    echo "<tr><td colspan='2'>".date('l d F', $timestamp)."</td>";
                    echo ' <td class="halfTd"><input required type="radio" class="radioButton" name="dateTime" value="'.$dateTimeValue.'"> &nbsp;16:30 </td>';
                }
            }elseif(date('N',$timestamp) == 5){

                $date1 = date('Y-m-d',$timestamp);
                $time1 = date('H:i:s',strtotime('19:30'));
                $dateTimeValue = date('Y-m-d H:i:s',strtotime($date1.' '.$time1));

                if($days['friday']){
                    echo "<tr><td colspan='2'>".date('l d F', $timestamp)."</td>";
                    echo ' <td class="halfTd"><input required type="radio" class="radioButton" name="dateTime" value="'.$dateTimeValue.'"> &nbsp;19:30 </td>';
                }
            }
        }
    }
}


for ($timestampNextWeek = strtotime('next week'); $timestampNextWeek < strtotime('next week') + (7 * 86400); $timestampNextWeek += 86400) {

    if (date('W', $timestampNextWeek) == date('W', $timestampNextWeek)) {
        if (date('N', $timestampNextWeek) == 2 || date('N', $timestampNextWeek) == 6 || date('N', $timestampNextWeek) == 7) {
            //No lessons on tuesday, saturday and sunday
        } else {
            if(date('N',$timestampNextWeek) == 1){

                $date1 = date('Y-m-d',$timestampNextWeek);
                $time1 = date('H:i:s',strtotime('15:45'));
                $dateTimeValue = date('Y-m-d H:i:s',strtotime($date1.' '.$time1));

                $time2 = date('H:i:s',strtotime('16:45'));
                $dateTimeValue2 = date('Y-m-d H:i:s',strtotime($date1.' '.$time2));

                if($days['monday1']){
                    echo "<tr><td colspan='2'>".date('l d F', $timestampNextWeek)."</td>";
                    echo '<td class="halfTd"><input required class="radioButton" type="radio" name="dateTime" value="'.$dateTimeValue.'">&nbsp; 15:45</td>';
                }
                if($days['monday2']){
                    if(!$days['monday1']){
                        echo "<tr><td colspan='2'>".date('l d F', $timestampNextWeek)."</td>";
                    }
                    echo '<td class="halfTd"><input required type="radio" class="radioButton" name="dateTime" value="'.$dateTimeValue2.'">&nbsp; 16:45 </td></tr>';
                }
            }elseif(date('N',$timestampNextWeek) == 3){

                $date1 = date('Y-m-d',$timestampNextWeek);
                $time1 = date('H:i:s',strtotime('13:45'));
                $dateTimeValue = date('Y-m-d H:i:s',strtotime($date1.' '.$time1));

                if($days['wednesday']){
                    echo "<tr><td colspan='2'>".date('l d F', $timestampNextWeek)."</td>";
                    echo '<td class="halfTd"><input required type="radio" class="radioButton" name="dateTime" value="'.$dateTimeValue.'">&nbsp; 13:45 </td>';
                }
            }elseif(date('N',$timestampNextWeek) == 4){

                $date1 = date('Y-m-d',$timestampNextWeek);
                $time1 = date('H:i:s',strtotime('16:30'));
                $dateTimeValue = date('Y-m-d H:i:s',strtotime($date1.' '.$time1));

                if($days['thursday']){
                    echo "<tr><td colspan='2'>".date('l d F', $timestampNextWeek)."</td>";
                    echo '<td class="halfTd"><input required type="radio" class="radioButton" name="dateTime" value="'.$dateTimeValue.'">&nbsp; 16:30 </td>';
                }
            }elseif(date('N',$timestampNextWeek) == 5){

                $date1 = date('Y-m-d',$timestampNextWeek);
                $time1 = date('H:i:s',strtotime('19:30'));
                $dateTimeValue = date('Y-m-d H:i:s',strtotime($date1.' '.$time1));

                if($days['friday']){
                    echo "<tr><td colspan='2'>".date('l d F', $timestampNextWeek)."</td>";
                    echo '<td class="halfTd"><input required type="radio" class="radioButton" name="dateTime" value="'.$dateTimeValue.'">&nbsp; 19:30 </td>';
                }
            }
        }
    }
}