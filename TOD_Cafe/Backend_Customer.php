<?php
include "localhost.php";
if(isset($_POST['add_stuff']))
{
    $name = $_POST['name'];
    $user = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['Gender'];
    $sql = "INSERT INTO `persons_cust`(`username`, `fullname`, `email`, `phonenumber`, `gender`) VALUES ('$user','$name','$email','$phone','$gender')";
    if ($conn->query($sql) === TRUE) 
    {
        $subject = "Confirmation of your Account";
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
                header("location: afterlogin admins panel.php?customer=persons_cust");
            } else 
            {
                echo "Email sending failed...";
            }
        } 
            else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
            header("location: Insert_stuff.php?user=$user");
        }
    } 
?>