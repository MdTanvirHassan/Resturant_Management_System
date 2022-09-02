<?php
include "localhost.php";
if(isset($_GET['user']))
{
    session_start();
    $_SESSION['user'] = $_GET['user'];
    $_SESSION['email'] = $_GET['email'];
} 
if(isset($_POST['edit_profile']))
{
    session_start();
    $change = $_POST['Change'];
    echo $change;
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];
    session_unset();
    session_destroy();
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "UPDATE `persons_cust` SET `discount` = '$change' WHERE `persons_cust`.`username` = '$user'";

    if (mysqli_query($conn, $sql)) 
    {
        $subject = "Updatation of Account OF $user";
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
                                        <p>Your acoount have been Update</p>
                                        <div class='title'>
                                            <h2>Mr $user,</h2>
                                            <h3>You have got $change% discount.</h3>
                                            <h3>From: TOD Cafe</h3>
                                        </div>
                                    </div>
                                </body>
                            </html>";
        if (mail($email, $subject, $body, $headers))
        {
            echo "Email successfully sent to $email...";
            header("location: afterlogin admins panel.php?customer=persons_cust");
        } 
        else 
        {
            echo "Email sending failed...";
        }
    } 
    else 
    {
        echo "Error updating record: " . mysqli_error($conn);
    }

}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Page</title>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,700&family=Poppins:wght@500&display=swap');
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'poppins', sans-serif;
            }
            body{
                display: flex;
                height: 100vh;
                justify-content: center;
                align-items: center;
                padding: 10px;
                background: linear-gradient(135deg, red);
            }
        </style>
    </head>
    <body>
    <form action = "discount.php" method = "POST">
    <label for="customRange2" class="form-label">Enter range: 1 to 25</label>
    <input type="range" class="form-range" min="0" max="25" name = "Change" id="customRange2">
    <input type = "submit" class = "btn btn-primary" value = "Add" name = "edit_profile">  
    </form>
    </body>
</html>
