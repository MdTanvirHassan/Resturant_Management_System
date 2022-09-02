<?php
$servername = "127.1.1.1";
$username = "root";
$password = "";
$dbname = "test1";
$conn = new mysqli($servername, $username, $password, $dbname);
if (isset($_POST['reg_user'])) 
{
    session_start();
    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['uname'] = $_POST['uname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['password'] = $_POST['password'];
    $email = $_SESSION['email'];
    $pass = $_SESSION['password'];
    $cnf =  $_POST['con_password'];
    $_SESSION['OTPV'] = rand(100000, 999999);
    $OTP = $_SESSION['OTPV'];
    if(isset($_REQUEST['gender-1']))
    {
        $_SESSION['gender'] = 'MALE';
    }
    if(isset($_REQUEST['gender-2']))
    {
        $_SESSION['password'] = 'FEMALE';
    }
    if(isset($_REQUEST['gender-3']))
    {
        $_SESSION['gender'] = 'Prefer not to say';
    }
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    if($pass!=$cnf)
    {
        echo "Don't match with two password<br>";
    }
    else
    {
        $subject = "OTP Verification";
        $body = "<!DOCTYPE html>
                <html>
                <body>
                    <h1>Your OTP IS: $OTP<h1> 
                </body>
                </html>";
        $headers = ["MIME-Version:1.0", "Content-type:text/html", "From:todcafe.bd.com@gmail.com"];
        $headers = implode("\r\n", $headers);
        if (mail($email, $subject, $body, $headers)) 
        {
            echo "Email successfully sent to $email...";
            header("Location: OTP.php");
            exit();
        }
        else 
        {
            echo "Email sending failed...";
        } 
    }
}

?>
