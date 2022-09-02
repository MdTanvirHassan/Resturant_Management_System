<?php
$servername = "127.1.1.1";
$username = "root";
$password = "";
$dbname = "test1";
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST['forget_user']))
{
    session_start();
    $_SESSION['user'] = $_POST['uname'];
    $user = $_SESSION['user'];
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT pass, email FROM persons_cust WHERE username= '$user'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0)
    {
        $OTP = rand(100000, 999999);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['pass'] = $row['pass'];
        $_SESSION['email'] = $row['email'];
        $email = $_SESSION['email'];
        $_SESSION['OTP'] = $OTP;
        $subject = "Recovery Account Password";
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
            header("Location: OTP Recovery.php");
            exit();
        }
        else 
        {
            echo "Email sending failed...";
        }
        exit();    
    }
    else 
    {
        echo "$user Doesn't exist Here!";
    }
}
?>