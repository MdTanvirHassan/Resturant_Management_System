<?php
$servername = "127.1.1.1";
$username = "root";
$password = "";
$dbname = "test1";
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST['Change_pass']))
{
    session_start();
    $user = $_SESSION['user'];
    $pass = $_SESSION['pass'];
    $email = $_SESSION['email'];
    session_unset();
    session_destroy();
    $newpass = $_POST['new_pass'];
    $conpass = $_POST['con_pass'];
    if($pass==$newpass)
    {
        echo "You have alreary this password";
    }
    else
    {
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        if($newpass!=$conpass)
        {
            echo "Password is incorrect";
        }
        else
        {
            $sql = "UPDATE persons_cust SET pass='$newpass', login_status=1 WHERE username='$user'";
            if (mysqli_query($conn, $sql)) 
            {
                echo "Record updated successfully";
                $subject = "Reset Password Confirmation";
                $body = "<!DOCTYPE html>
                <html>
                <head>
                    <title>Profile Card</title>
                    <style>
                        *{
                            margin: 0;
                            padding: 0;
                            box-sizing: border-box;
                            font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                        }
                        body{
                            display: flex;
                            height: 100vh;
                            justify-content: center;
                            align-items: center;
                            padding: 10px;
                        }
                        .container{
                            max-width: 700px;
                            width: 100%;
                            background: #fff;
                            padding: 25px 30px;
                            border-radius: 5px;
                            background: linear-gradient(120deg, rgb(106, 158, 230), rgb(8, 217, 245) );
                            justify-content:space-between;
                        }
                        .container h1{
                            font-size: 36px;
                            font-weight: 500;
                            position: relative;
                            display: inline;
                        }
                        .container h2{
                            font-size: 24px;
                            font-weight: 500;
                            position: relative;
                            margin-bottom: 10px;
                            text-decoration: underline;
                            display: inline;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <h1>Congratulations</h1>
                        <p>A mail from admin</p>
                        <div class='title'>
                            <h2>Mr, $user,</h2>
                            <h3>Your password has been changed. Secure your account</h3>
                            <h2>TOD Cafe</h2>
                        </div>
                    </div>
                </body>
            </html>";;
                $headers = ["MIME-Version:1.0", "Content-type:text/html", "From:todcafe.bd.com@gmail.com"];
                $headers = implode("\r\n", $headers);
                if (mail($email, $subject, $body, $headers)) 
                {
                    echo "Email successfully sent to $email...";
                    header("location: restaurantpart1.php?user_name=$user");
                    exit();
                }
                else 
                {
                    echo "Email sending failed...";
                }
                
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
    }
    mysqli_close($conn);
}
?>