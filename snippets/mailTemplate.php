<?php
//No spaces can be used in $googleDateStart and End, $linkDetails, $location and $eventName
//Use +'s instead!

//Google Add to Calendar URL variables
//Convert datetime to Google Calendar format
$googleDateStart = date('Ymd\THi00\Z',strtotime($dateTime) - 3600); //Minus some time to account for timezone...
$googleDateEnd   = date('Ymd\THi00\Z',strtotime($dateTime) + $durationSec);

$linkDetails = 'Email:+'.$email.'++Tel:+'.$tel.'++Leeftijd:+'.$age.'++Geslacht:+'.$gender;
$location = 'Grote+Waard+13,+2675+BX+Honselersdijk';


//Variables depending on group- or privatelesson
if(isset($_POST['submitGroupForm'])){
    $h2 = 'U heeft een groepsles gepland';
    $duration = '45 minuten';
    $durationSec = -900;
    $cost = 'Gratis';
    $eventName = 'Groepsles+bij+Leondrums';
}elseif(isset($_POST['submitPrivateForm'])){
    $h2 = 'U heeft een priveles gepland';
    $duration = '30 minuten';
    $durationSec = -1800;
    $cost = '&euro;30,-';
    $eventName = 'Priveles+bij+Leondrums';
}

$emailMessage = '

                <h1>Dank u wel!</h1>
                <h2>'.$h2.'</h2>


                <table>
                <tbody>
                    <tr>
                        <td>Naam:</td>
                        <td>'.$firstName.' '.$lastName.'</td>
                    </ tr>
                    <tr>
                        <td>Leeftijd:</td>
                        <td>'.$age.'</td>
                    </tr>
                    <tr>
                        <td>Geslacht:</td>
                        <td>'.$gender.'</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>'.$email.'</td>
                    </tr>
                    <tr>
                        <td>Telefoonnummer:</td>
                        <td>'.$tel.'</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Tijd:</td>
                        <td>'.date('l d F \o\m H:i',strtotime($dateTime)).'</td>
                    </tr>
                    <tr>
                        <td>Duur:</td>
                        <td>'.$duration.'</td>
                    </tr>
                    <tr>
                        <td>Kosten:</td>
                        <td>'.$cost.'</td>
                    </tr>
                </tbody>
                </table>

                <a href="https://www.google.com/calendar/render?action=TEMPLATE&text='.$eventName.'&dates='.$googleDateStart.'/'.$googleDateEnd.'&details='.$linkDetails.'&location='.$location.'&sf=true&output=xml">Voeg toe aan Google Calendar</a>

                <p>Kunt u niet meer aanwezig zijn bij de proefles of heeft u andere vragen? Reageer dan op deze mail of bel naar: 06 19302890</p>

                ';
