<?php include("php/adminStart.php"); ?>

<!DOCTYPE>
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
</head>
<body>

<div id="wrapper">

    <h1>Admin</h1><br/>


    <h2>Priv&eacute;lessen data</h2><hr>
    <form action="" method="POST" name="privateFormSetDates">
        <table cellspacing="0" cellpadding="0" width="100%" id="adminDataTable">
            <?php include("php/dataForm.php"); ?>
        </table>
        <table width="100%" style="margin-top: 10px">
            <tr><td colspan="4"><input type="submit" name="submitp" value="Opslaan" class="submitButton"></td></tr>
        </table>
    </form>

<!--   Turn groupdays on or off   -->
    <h2 style="margin-top: 60px">Groepslessen data</h2><hr>
    <form action="" method="POST" name="groupFormSetDates">
        <table cellspacing="0" cellpadding="0" width="100%" id="adminDataTable">
            <?php include("php/dataFormG.php"); ?>
        </table>
        <table width="100%" style="margin-top: 10px">
            <tr><td colspan="4"><input type="submit" name="submitg" value="Opslaan" class="submitButton"></td></tr>
        </table>
    </form>

    <br><h1>Geplande proeflessen</h1><br>
    <?php include("php/plannedLessons.php") ?>

</div>

</body>
</html>