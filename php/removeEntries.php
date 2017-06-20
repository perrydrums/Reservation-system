<?php
include("connect.php");

//Removes old dates from availability table
//AND remove dates from availability if a lesson has already been planned that time

$getAvailable = mysqli_query($connect,"SELECT * FROM available");


while($availableRow = mysqli_fetch_array($getAvailable)){
    //Remove old dates
    if(strtotime($availableRow['date']) < strtotime(date('Y-m-d'))){
        $deleteDate = $availableRow['date'];
        $deleteEntries1 = mysqli_query($connect,"DELETE FROM available WHERE date = '".$deleteDate."'");
    }
    //Remove taken dates
    $getPrivateLessons = mysqli_query($connect,"SELECT * FROM privatelessons");
    while($privateRow = mysqli_fetch_array($getPrivateLessons)){

        $dateTimePrivate = $privateRow['datetime'];

        //Merge date and time form availability table to datetime
        $dateAvailable = $availableRow['date'];
        $timeAvailable = $availableRow['time'];
        $dateTimeAvailable = date("Y-m-d H:i:s",strtotime($dateAvailable.' '.$timeAvailable));

        if($dateTimePrivate == $dateTimeAvailable){
            $deleteEntries2 = mysqli_query($connect,"DELETE FROM available WHERE date = '".$dateAvailable."' AND time = '".$timeAvailable."'");
        }
    }
}


//Remove duplicates from availability table
mysqli_query($connect,"CREATE TABLE Temp AS SELECT * FROM available GROUP BY date, time");
mysqli_query($connect,"DELETE FROM available");
mysqli_query($connect,"INSERT INTO available SELECT * FROM Temp");
mysqli_query($connect,"DROP TABLE Temp");

mysqli_query($connect,"CREATE TABLE Temp AS SELECT * FROM groupdays GROUP BY date, time");
mysqli_query($connect,"DELETE FROM groupdays");
mysqli_query($connect,"INSERT INTO groupdays SELECT * FROM Temp");
mysqli_query($connect,"DROP TABLE Temp");


