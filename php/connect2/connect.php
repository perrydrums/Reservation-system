<?php

$connect = mysqli_connect("localhost","leondrums_wp917","!S5@0PJN34","leondrums_wp917");//host, username, password, database

if(!$connect){
    echo "Kan niet verbinden met database.";
}else{
    //echo "Verbonden met database.";
}

//Mail info
$mailUsername   = 'psperryjanssen@gmail.com';
$mailPassword   = 'google2003';

//Sender of mail
$mailFrom       = 'leon@leondrums.nl';
$mailFromName   = 'Drumschool Leon van der Geest';

//Receiver of mail (this one's for yourself) (mail gets also sent to user)
$mailSendTo     = 'psperryjanssen@gmail.com';
$mailSendToName = 'Reservingssysteem';

//Email which users can contact
$replyToMail    = '<psperryjanssen@gmail.com>';

//Admin
$adminPass      = '1234';
