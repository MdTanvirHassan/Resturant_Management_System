<html>
    <head>
        <title>Dummy PayPal Payment</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
<?php
include "localhost.php";
if(isset($_POST['PayNow']))
{
    $recv = $_POST['Reciever'];
    $money = $_POST['amount'];
    $send = $_POST['sender'];
    $pass = $_POST['pass'];
    $subject = "Verification Code";
    $OTP = rand(100000, 999999);
    session_start();
    $_SESSION['otp'] = $OTP;
    $_SESSION['Reciever'] = $recv;
    $_SESSION['amount'] = $money;
    $_SESSION['sender'] = $send;
    $_SESSION['pass'] = $pass;
    $body = "<!DOCTYPE html>
            <html>
            <body>
                <h1>Your OTP IS: $OTP<h1> 
            </body>
            </html>";
    $headers = ["MIME-Version:1.0", "Content-type:text/html", "From:todcafe.bd.com@gmail.com"];
    $headers = implode("\r\n", $headers);
    if (mail($send, $subject, $body, $headers)) 
    {
        echo "<div class='w-25 p-3 position-absolute top-50 start-50 translate-middle'>
                <h1 class = 'text-primary text-center'>PAYMENT Confirm <span class='badge bg-primary'>PayPal</span></h1>
                <form action='payment_paypal.php' method='post'>
                <div class='mb-3'>
                    <label for='exampleFormControlInput1' class='form-label'>Verification Code:</label>
                    <input type='text' class='form-control' id='exampleFormControlInput1' placeholder='Verification Code:' name = 'code'>
                </div>
                <div class='d-grid gap-2 col-6 mx-auto w-auto'>
                    <input class='btn rounded-pill btn-primary' type='submit' name = 'Confirm' value = 'Confirm'>        
                </div>
                </form>
            </div>";        
    }
    else 
    {
        echo "Email sending failed...";
    }
}
if(isset($_GET['admin']) && isset($_GET['money']))
{
    $recv = $_GET['admin'];
    $money = $_GET['money'];
    echo "<div class='w-25 p-3 position-absolute top-50 start-50 translate-middle'>
    <h1 class = 'text-primary text-center'>PAYMENT <span class='badge bg-primary'>PayPal</span></h1>
    <form action='payment_paypal.php' method='post'>
    <div class='mb-3'>
        <label for='exampleFormControlInput1' class='form-label'>Sender Mail:</label>
        <input type='email' class='form-control' id='exampleFormControlInput1' placeholder='Email' name = 'sender'>
    </div>
    <div class='mb-3'>
        <label for='exampleFormControlInput1' class='form-label'>Password:</label>
        <input type='password' class='form-control' id='exampleFormControlInput1' placeholder='Password' name = 'pass'>
    </div>
    <div class='mb-3'>
        <label for='exampleFormControlInput1' class='form-label'>Amount: </label>
        <input type='number' class='form-control' id='exampleFormControlInput1' name = 'amount' value = '$money'>
    </div>
    <div class='mb-3'>
        <label for='exampleFormControlInput1' class='form-label'>Reciever </label>
        <input type='email' class='form-control' id='exampleFormControlInput1' name = 'Reciever' placeholder='Email' value = '$recv'>
    </div>
    <div class='d-grid gap-2 col-6 mx-auto w-auto'>
        <input class='btn rounded-pill btn-primary' type='submit' name = 'PayNow' value = 'Pay Now'>        
        <a  class = 'text-dark text-center'>Having trouble logging in?</a>
        <a class='btn rounded-pill btn-primary'>Sign Up</a>
    </div>
    </form>
</div>";
}

if(isset($_POST['Confirm']))
{
    session_start();
    $recv = $_SESSION['Reciever'];
    $money = $_SESSION['amount'];
    $send = $_SESSION['sender'];
    $pass = $_SESSION['pass'];
    if($_POST['code'] == $_SESSION['otp'])
    {
        session_unset();
        session_destroy();
        $sql = "SELECT * FROM `paypal` WHERE `email` = '$send' AND `pass` = '$pass'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $n = $row['amount'] - $money;
        $sql = "UPDATE `paypal` SET `amount`='$n' WHERE `email`='$send'";
        $subject = "Payment By PayPal";
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
                        <h1>PayPal</h1>
                        <div class='title'>
                            <h2>Taka $money has been deducted from your account!</h2>
                        </div>
                    </div>
                </body>
            </html>";
            if (mail($send, $subject, $body, $headers))
            {
                if(mysqli_query($conn, $sql))
                {
                    $sql = "SELECT * FROM `paypal` WHERE `email` = '$recv'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $n = $row['amount'] + $money;
                    $sql = "UPDATE `paypal` SET `amount`='$n' WHERE `email`='$recv'";
                    if(mysqli_query($conn, $sql))
                    {
                        $subject = "Payment By PayPal";
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
                        <h1>PayPal</h1>
                        <div class='title'>
                            <h2>Taka $money has been added from your account!</h2>
                        </div>
                    </div>
                </body>
            </html>";
            if (mail($recv, $subject, $body, $headers))
            {
                $sql = "SELECT * FROM persons_cust WHERE login_status=1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 1)
                {
                    $row = mysqli_fetch_assoc($result); 
                }
                $user = $row['username'];
                $sql = "UPDATE `confirm_order` SET `Payment`='1' WHERE `username`='$user' AND `Payment`='0' AND `Payment_option` = 'PayPal'";
                if(mysqli_query($conn, $sql))
                {
                    header("location:restaurantpart1.php");
                }
            }
                    }
                }
            } else 
            {
                echo "Email sending failed...";
            }
        } 
            else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>