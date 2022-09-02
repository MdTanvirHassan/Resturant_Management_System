<?php
if(isset($_POST['OTP_user']))
{
    session_start();
    $servername = "127.1.1.1";
    $username = "root";
    $password = "";
    $dbname = "test1"; 
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    $user = $_SESSION['uname'];
    $name = $_SESSION['fname'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $pass = $_SESSION['password'];
    $gender = $_SESSION['gender'];
    $otp = $_SESSION['OTPV'];
    session_unset();
    session_destroy();
    $OTP = $_POST['OTP'];
    if($otp==$OTP)
    {
        $sql = "INSERT INTO persons_cust(username, fullname, email, phonenumber, pass, gender) 
                VALUES ('$user','$name','$email','$phone','$pass','$gender')";
        if ($conn->query($sql) === TRUE) 
        {
            $subject = "Confirmation of Your Account";
            $headers = ["MIME-Version:1.0", "Content-type:text/html", "From:todcafe.bd.com@gmail.com", ];
            $headers = implode("\r\n", $headers);
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
                        <h1>Welcome To Our Restaurent</h1>
                        <p>Let's take a a look of your profile</p>
                        <div class='title'>
                            <h2>Full Name:</h2>
                            <h3>$name</h3>
                        </div>
                        <div class='title'>
                            <h2>User Name:</h2>
                            <h3>$user</h3>
                        </div>
                        <div class='title'>
                            <h2>Email:</h2>
                            <h3>$email</h3>
                        </div>
                        <div class='title'>
                            <h2>Phone:</h2>
                            <h3>$phone</h3>
                        </div>
                        <div class='title'>
                            <h2>Gender:</h2>
                            <h3>$gender</h3>
                        </div>
                    </div>
                </body>
            </html>";
            if (mail($email, $subject, $body, $headers))
            {
                echo "Email successfully sent to $to_email...";
                header("location: restaurantpart1.php?user_name=$user");
            } else 
            {
                echo "Email sending failed...";
            }
        } 
            else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
            header("location: registration.php?user=$user");
        }
    }
}
?>