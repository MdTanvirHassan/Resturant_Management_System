<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reason Of Deletion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="p-3 mb-2 bg-primary h-100 text-white">Write Your Request</div>
    <?php
    include "localhost.php";
    if(isset($_GET['stuff_Delete']))
    {
        session_start();
        $_SESSION['user_Delete'] = $_GET['stuff_Delete']; 
        $_SESSION['email'] = $_GET['email'];   
    }
    if(isset($_POST['delete']))
    {
        session_start();
        if(isset($_POST['1']))
        {
            $reason = $_POST['1'];
        }
        else if(isset($_POST['2']))
        {
            $reason = $_POST['2'];
        }
        else if(isset($_POST['3']))
        {
            $reason = $_POST['3'];
        }
        else if(isset($_POST['4']))
        {
            $reason = $_POST['4'];
        }
        echo $reason;
        $user = $_SESSION['user_Delete'];
        $email = $_SESSION['email'];
        session_unset();
        session_destroy();
        $sql = "DELETE FROM persons_stuff WHERE username = '$user'";
        if (mysqli_query($conn, $sql)) 
        {
            echo "Record deleted successfully";
            $subject = "Termination Letter For $user";
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
                                        <p>You have been terminated</p>
                                        <div class='title'>
                                            <h2>Mr $user,</h2>
                                            <h3>You have been terminated by our Admin. We don't need your service anymore. The reason is $reason. Let's hope your future life will be good.</h3>
                                            <h3>From: TOD Cafe</h3>
                                        </div>
                                    </div>
                                </body>
                            </html>";
                    if (mail($email, $subject, $body, $headers))
                    {
                        echo "Email successfully sent to $email...";
                        header("Location: afterlogin admins panel.php?stuff=stuff");
                    } else 
                    {
                        echo "Email sending failed...";
                    }
        } 
        else
        {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    ?>
    <form action = "Terminate_stuff.php" method = "post" class="position-absolute top-50 start-50 translate-middle w-75 p-3">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name = "1" value="You are not active for few months" id="flexCheckIndeterminate">
        <label class="form-check-label" for="flexCheckIndeterminate">
            He is not active for few months
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name = "2" value="You break our policy" id="flexCheckIndeterminate">
        <label class="form-check-label" for="flexCheckIndeterminate">
            He breaks our policy
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name = "3" value="Your behaviour is not good to our stuffs." id="flexCheckIndeterminate">
        <label class="form-check-label" for="flexCheckIndeterminate">
            His behaviour is not good to our stuffs.
        </label>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Others</label>
        <textarea class="form-control" name = "4" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
        <input type = "submit" class = "btn btn-info" value = "Delete" name = "delete">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
</body>
</html>