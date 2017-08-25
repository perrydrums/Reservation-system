<?php
include("php/connect.php");

if (isset ($_GET["datum"])) {
    $datum = $_GET["datum"];
    $query1 = mysqli_query($connect,"SELECT id, date, DATE_FORMAT(time, '%H:%i') time FROM available WHERE date='$datum'");
    $rows = array();
    while($r = mysqli_fetch_assoc($query1)) {
        $rows[] = $r;
    } 
    print json_encode($rows);
}


if (isset ($_GET["datumG"])) {
    $datum = $_GET["datumG"];
    $query1 = mysqli_query($connect,"SELECT id, date, DATE_FORMAT(time, '%H:%i') time, capacity FROM groupdays WHERE date='$datum' AND capacity != 0");
    $rows = array();
    while($r = mysqli_fetch_assoc($query1)) {
        $rows[] = $r;
    }
    print json_encode($rows);
}
