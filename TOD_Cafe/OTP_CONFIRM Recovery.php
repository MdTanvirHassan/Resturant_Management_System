<?php
if(isset($_POST['OTP_user']))
{
    $servername = "127.1.1.1";
    $username = "root";
    $password = "";
    $dbname = "test1"; 
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    if($otp==$OTP)
    {
        header("Location: new_pass.php?");
    }
}
?>