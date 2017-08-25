<?php
        include("php/connect.php");                 //Connect to database
        include("php/removeEntries.php");           //Cleans up database
        require_once("vendor/vendor/autoload.php"); //PHPMailer files
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reserveringssysteem</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="shortcut icon" href="favicon.ico">
    <meta charset="utf-8">

    <!-- Font -->
    <link href="//fonts.googleapis.com/css?family=Andada" rel="stylesheet">

    <!-- Jquery -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Show and hide the div's -->
    <script src="js/showHideForms.js" type="text/javascript"></script>
</head>


<body>
<div id="wrapper">

    <!-- Choose between Group or Private lesson -->
    <div id="pickLessonTable">
        <table width="100%"><tr><td><h1>Plan een proefles!</h1></td></tr></table>
        <table class="pickLessonTable">
            <tr>
                <td class="pickLessonTable"><button onclick="showGroupForm()" id="groupButton" class="pickLessonButton" name="groupLesson" style="margin-right: 10px;">Groepsles<br><span style="font-size:13px;">Gratis</span></button></td>
                <td class="pickLessonTable"><button onclick="showPrivateForm()" id="privateButton" class="pickLessonButton" name="privateLesson" style="margin-left: 10px;">Priv&eacute;les<br><span style="font-size:13px;">&euro;30,-</span></button></td>
            </tr>
        </table>
    </div>

    <!-- Group lessons form -->
    <div id="groupFormDiv">
        <table width="100%">
            <tr>
                <td width="15%"><button onclick="backToPickTable()" id="backToPickTable">&laquo;</button></td>
                <td width="70%"><h1>Plan een groepsles!</h1></td>
                <td width="15%"></td>
            </tr>
            <tr>
                <td colspan="3"><h3>Gratis! Les duurt 45 minuten</h3></td>
            </tr>
        </table>
        <?php include("snippets/groupForm.php"); ?>
    </div>

    <!-- Group form sent success -->
    <div id="groupFormSuccess">
        <div id="alert">Afspraak gemaakt!
            <div style="margin-bottom: 20px" class="confirmMessage"></div>
            U krijgt binnenkort een bevestigingsmail. (Check ook uw ongewenste berichten)
            <p>Lukt de reservering niet of krijg je geen bevestigingsmail? Mail dan de datum en tijd van de reservering naar <a href="mailto:afspraak@leondrums.nl">afspraak@leondrums.nl</a></p>
            <button onclick="location.reload()" id="backToPickTable2">&laquo; Terug</button>
        </div>
    </div>


    <!-- Private lessons form -->
    <div id="privateFormDiv">
        <table width="100%">
            <tr>
                <td width="15%"><button onclick="backToPickTable()" id="backToPickTable">&laquo;</button></td>
                <td width="70%"><h1>Plan een priv&eacute;les!</h1></td>
                <td width="15%"></td>
            </tr>
            <tr>
                <td colspan="3"><h3>&euro;30,- Les duurt 30 minuten</h3></td>
            </tr>
        </table>
        <?php include("snippets/privateForm.php"); ?>
    </div>

    <!-- Private form sent success -->
    <div id="privateFormSuccess">
        <div id="alert">Afspraak gemaakt!
            <div style="margin-bottom: 20px" class="confirmMessage"></div>
            U krijgt binnenkort een bevestigingsmail. (Check ook uw ongewenste berichten)
            <p>Lukt de reservering niet of krijg je geen bevestigingsmail? Mail dan de datum en tijd van de reservering naar <a href="mailto:afspraak@leondrums.nl">afspraak@leondrums.nl</a></p>
            <button onclick="location.reload()" id="backToPickTable2">&laquo; Terug</button>
        </div>
    </div>

    <!-- Script sends data to processForms.php (also shows confirmation message) -->
    <script src="js/sendAndRetrieveForms.js" type="text/javascript"></script>

</div>
</body>
</html>
