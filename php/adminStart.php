<?php
include("connect.php");
require ("vendor/vendor/phpmailer/phpmailer/PHPMailerAutoload.php");

//Admin login system
session_start();

//Log out if away for more than 900s (15 minutes)
if (isset($_SESSION['time']) && (time() - $_SESSION['time'] > 900)) {
    session_unset();
    session_destroy();
}

$_SESSION['time'] = time();

//If not logged in: show login form
if(!isset($_SESSION['id'])){
    if(isset($_POST['login'])){
        if($_POST['password'] == $adminPass){
            $_SESSION['id'] = true;
            header("Location: admin.php");
        }else{
            echo '<span style="text-align: center">Wachtwoord fout!</span>';
        }
    }
?><span style="text-align: center">
        <h1 style="margin-top: 5%">LeonDrums - Admin</h1>
        <form action="" method="POST">
            <input type="password" required name="password" placeholder="Wachtwoord">
            <input type="submit" name="login" value="Log in">
        </form>
    </span>
<?php die; } else {


    //Process privatelesson date form
    if (isset($_POST['submitp'])) {

        for ($selectNumber = 0; $selectNumber < (count($_POST) / 2) - 1; $selectNumber++) { //Loop for as many inputs are sent
            $time = $_POST['selectp' . $selectNumber];                                      //Its the number of entries in the _POST array
            $date = date("Y-m-d", $_POST['hiddenp' . $selectNumber]);                       //divided by 2 (because of hidden entries) and -1 (submit button)

            //Is time not empty? Insert date and time in database
            if ($_POST['selectp' . $selectNumber] != '') {
                $insertDate = mysqli_query($connect, "INSERT INTO available VALUES ('','$date','$time')");
            }
        }
        header("Location: admin.php");
        die;
    }


    //Process grouplesson date form
    if (isset($_POST['submitg'])) {

        for ($selectNumber = 0; $selectNumber < (count($_POST) / 3) - 1; $selectNumber++) { //Loop for as many inputs are sent
            $time = $_POST['selectg' . $selectNumber];                                          //Its the number of entries in the _POST array
            $date = date("Y-m-d", $_POST['hiddeng' . $selectNumber]);                           //times 2/3 (because of hidden entries) and -1 (submit button)
            $capacity = $_POST['capacity' . $selectNumber];


            //Is time not empty? Insert date and time in database
            if ($_POST['selectg' . $selectNumber] != '') {
                $insertDate = mysqli_query($connect, "INSERT INTO groupdays VALUES ('','$date','$time','$capacity')");
            }
        }
        header("Location: admin.php");
    }



    //Delete planned lessons
    if(isset($_GET['deleteprivateid'])){
        mysqli_query($connect,"DELETE FROM privatelessons WHERE id='".$_GET['deleteprivateid']."'");
        header("Location: admin.php");
    }
    if(isset($_GET['deletegroupid'])){
        mysqli_query($connect,"DELETE FROM grouplessons WHERE id='".$_GET['deletegroupid']."'");
        header("Location: admin.php");
    }

}
?>
