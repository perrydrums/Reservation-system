<?php

include("connect.php");

//Process Group Form
if(isset($_POST['submitGroupForm'])){

    $firstName = mysqli_real_escape_string($connect, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($connect, $_POST['lastName']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $tel = mysqli_real_escape_string($connect, $_POST['tel']);
    $age = mysqli_real_escape_string($connect, $_POST['age']);
    $gender = mysqli_real_escape_string($connect, $_POST['gender']);

    //Merge date and time variables into mySQL DateTime
    $date = $_POST['date'];
    $time = $_POST['time'];
    $dateTime = date("Y-m-d H:i:s",strtotime($date.' '.$time.':00'));

    $insertGroupLesson = mysqli_query($connect,"INSERT INTO grouplessons VALUES ('','$firstName','$lastName','$email','$tel','$age','$gender','$dateTime')");

    mysqli_query($connect,"UPDATE groupdays SET capacity = (capacity - 1) WHERE date = '$date' AND time = '$time'");

    //This will show if the user had Javascript disabled (or something went wrong)
    echo("<div id='alert'>Afspraak gemaakt!</div>");

    include("sendMail.php");


//Process Private Form
}elseif(isset($_POST['submitPrivateForm'])){

    $firstName = mysqli_real_escape_string($connect, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($connect, $_POST['lastName']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $tel = mysqli_real_escape_string($connect, $_POST['tel']);
    $age = mysqli_real_escape_string($connect, $_POST['age']);
    $gender = mysqli_real_escape_string($connect, $_POST['gender']);

    //Merge date and time variables into mySQL DateTime
    $date = $_POST['date'];
    $time = $_POST['time'];
    $dateTime = date("Y-m-d H:i:s",strtotime($date.' '.$time.':00'));

    $insertPrivateLesson = mysqli_query($connect,"INSERT INTO privatelessons VALUES ('','$firstName','$lastName','$email','$tel','$age','$gender','$dateTime')");
    //Remove date from availability
    $removeFromAvailable = mysqli_query($connect,"DELETE FROM available WHERE date = '".$date."' AND time = '".$time."'");

    //This will show if the user had Javascript disabled (or something went wrong)
    echo("<div id='alert'>Afspraak gemaakt!</div>");

    include("sendMail.php");



}else{}
