<?php
include("connect.php");

$getPrivateLessons = mysqli_query($connect,"SELECT * FROM privatelessons ORDER BY datetime ASC");
$getGroupLessons = mysqli_query($connect,"SELECT * FROM grouplessons ORDER BY datetime ASC");
?>


<!-- Private lessons -->
<div id="privateLessonsDiv">
    <h2 style="text-align: left; margin-bottom: 0;">Privélessen</h2>
    <hr>

<?php

    if(mysqli_num_rows($getPrivateLessons) == 0){
        echo('Er zijn geen priv&eacute;lessen gepland');
    }else{
        while($privateLessons = mysqli_fetch_assoc($getPrivateLessons)){ ?>

            <div class="lesson">
                <table width="100%">
                    <caption><h4 style="margin-bottom: 20px; margin-top: 0;"><?php echo $privateLessons['datetime']; ?></h4></caption>
                    <tr>
                        <td>Naam: </td>
                        <td style="width: 60%"><?php echo $privateLessons['firstname'].' '.$privateLessons['lastname']; ?></td>
                    </tr>
                    <tr>
                        <td>Leeftijd: </td>
                        <td><?php echo $privateLessons['age'];?></td>
                    </tr>
                    <tr>
                        <td>Geslacht: </td>
                        <td><?php echo $privateLessons['gender'];?></td>
                    </tr>

                    <tr>
                        <td>Email: </td>
                        <td><?php echo $privateLessons['email'];?></td>
                    </tr>
                    <tr>
                        <td>Telefoonnummer: </td>
                        <td><?php echo $privateLessons['tel'];?></td>
                    </tr>
                </table>
                <?php
                //Convert datetime to Google Calendar format
                $googleDateStart = date('Ymd\THi00\Z',strtotime($privateLessons['datetime']) - 3600); //Minus some time to account for timezone...
                $googleDateEnd   = date('Ymd\THi00\Z',strtotime($privateLessons['datetime']) - 1800);

                $details = 'Email:+'.$privateLessons['email'].'++Tel:+'.$privateLessons['tel'].'++Leeftijd:+'.$privateLessons['age'].'++Geslacht:+'.$privateLessons['gender']; //+'s for spaces!

                ?>

                <!-- Google Add to Calendar link -->
                <a href="https://www.google.com/calendar/render?action=TEMPLATE&text=<?php echo $privateLessons['firstname'].'+'.$privateLessons['lastname']; ?>&dates=<?php echo $googleDateStart ?>/<?php echo $googleDateEnd ?>&details=<?php echo $details ?>&location=Grote+Waard+13,+2675+BX+Honselersdijk&sf=true&output=xml">Voeg toe aan Google Calendar</a>
                <br>
                <a href="admin.php?deleteprivateid=<?php echo($privateLessons['id']); ?>">Verwijder</a>

            </div>
    <?php }
    }?>
</div>


<!-- Grouplessons -->
<div id="groupLessonsDiv">
    <h2 style="text-align: left; margin-bottom: 0;">Groepslessen</h2>
    <hr>
    <?php

if(mysqli_num_rows($getGroupLessons) == 0){
    echo('Er zijn geen groepslessen gepland');
}else{
    while($groupLessons = mysqli_fetch_assoc($getGroupLessons)){ ?>

        <div class="lesson">
            <table width="100%">
                <caption><h4 style="margin-bottom: 20px; margin-top: 0;"><?php echo $groupLessons['datetime']; ?></h4></caption>
                <tr>
                    <td>Naam: </td>
                    <td style="width: 60%"><?php echo $groupLessons['firstname'].' '.$groupLessons['lastname']; ?></td>
                </tr>
                <tr>
                    <td>Leeftijd: </td>
                    <td><?php echo $groupLessons['age'];?></td>
                </tr>
                <tr>
                    <td>Geslacht: </td>
                    <td><?php echo $groupLessons['gender'];?></td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td><?php echo $groupLessons['email'];?></td>
                </tr>
                <tr>
                    <td>Telefoonnummer: </td>
                    <td><?php echo $groupLessons['tel'];?></td>
                </tr>
            </table>

            <?php
            //Convert datetime to Google Calendar format
            $googleDateStart = date('Ymd\THi00\Z',strtotime($groupLessons['datetime']) - 3600); //Minus some time to account for timezone...
            $googleDateEnd   = date('Ymd\THi00\Z',strtotime($groupLessons['datetime']) - 1800);

            $details = 'Email:+'.$groupLessons['email'].'++Tel:+'.$groupLessons['tel'].'++Leeftijd:+'.$groupLessons['age'].'++Geslacht:+'.$groupLessons['gender']; //+'s for spaces!

            ?>

            <a href="https://www.google.com/calendar/render?action=TEMPLATE&text=<?php echo $groupLessons['firstname'].'+'.$groupLessons['lastname']; ?>&dates=<?php echo $googleDateStart ?>/<?php echo $googleDateEnd ?>&details=<?php echo $details ?>&location=Grote+Waard+13,+2675+BX+Honselersdijk&sf=true&output=xml">Voeg toe aan Google Calendar</a>

            <a href="admin.php?deletegroupid=<?php echo($groupLessons['id']); ?>">Verwijder</a>

        </div>
    <?php

    }
    } ?>
</div>
