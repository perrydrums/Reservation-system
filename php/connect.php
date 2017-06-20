<?php

    $connect = mysqli_connect("localhost","root","","leondrums");//host, username, password, database

    if(!$connect){
        echo "Kan niet verbinden met database.";
    }else{
        //echo "Verbonden met database.";
    }

    //Mail info
    $mailUsername   = '';
    $mailPassword   = '';

    //Sender of mail
    $mailFrom       = '';
    $mailFromName   = '';

    //Receiver of mail (this one's for yourself) (mail gets also sent to user)
    $mailSendTo     = '';
    $mailSendToName = '';

    //Email which users can contact
    $replyToMail    = '';

    //Admin
    $adminPass      = '1234';
