<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request To The Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="p-3 mb-2 bg-primary h-100 text-white">Write Your Request</div>
    <?php
        if(isset($_GET['user']))
        {
            session_start();
            $_SESSION['user'] = $_GET['user'];
            $_SESSION['email'] = $_GET['email'];
        }
        if(isset($_POST['mail']))
            {
                include "localhost.php";
                session_start();
                $user = $_SESSION['user'];
                $email = $_SESSION['email'];
                session_unset();
                session_destroy();
                $message = $_POST['body'];
                $sql = "INSERT INTO `request_customer`(`username`, `message`) VALUES ('$user','$message')";
                if ($conn->query($sql) === TRUE)
                {
                    $subject = "Request Has Been Sent";
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
                                        <h1>TOD Cafe Restaurent</h1>
                                        <p>Let's take a a look of your profile</p>
                                        <div class='title'>
                                            <h2>Hello $user,</h2>
                                            <h3>Your request has been sent to our Admin. Our admin will send you result as soon as posible.</h3>
                                            <h3>From: TOD Cafe</h3>
                                        </div>
                                    </div>
                                </body>
                            </html>";
                            if (mail($email, $subject, $body, $headers))
                            {
                                echo "Email successfully sent to $email...";
                                header("location: Profile.php?user=$user");
                            } else 
                            {
                                echo "Email sending failed...";
                            }
                }

            }
    ?>
    <form action = "Request.php" method = "post" class="position-absolute top-50 start-50 translate-middle w-75 p-3">
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Enter Your Request</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "body"></textarea>
        </div>
        <input type = "submit" class = "btn btn-info" value = "Send" name = "mail">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
</body>
</html>