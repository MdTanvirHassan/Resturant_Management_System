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
    $option  = $_POST['option'];
    $change = $_POST['Change'];
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];
    session_unset();
    session_destroy();
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "UPDATE persons_cust SET $option ='$change' WHERE username='$user'";

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
                                            <h3>Your account have been updated by our Admin. Let's hope you like Our services. If you have any query, Let us know by using Request Pennel.</h3>
                                            <h3>From: TOD Cafe</h3>
                                        </div>
                                    </div>
                                </body>
                            </html>";
                            if (mail($email, $subject, $body, $headers))
                            {
                                echo "Email successfully sent to $email...";
                                header("location: afterlogin admins panel.php?customer=persons_cust");
                            } else 
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
    <form action = "edit_customer.php" method = "POST">
    <select class="form-select" aria-label="Disabled select example" name="option" required>
        <option selected disabled>Enter Your Edit Item</option>
        <option value="fullname">Name</option>
        <option value="username">User Name</option>
        <option value="pass">Password</option>
        <option value="email">E-mail</option>
        <option value="phonenumber">Phone Number</option>
    </select><br>
    <label for="exampleDataList" class="form-label">Enter Your Change</label>
    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="" name = "Change" required><br>
    <input type = "submit" class = "btn btn-primary" value = "Update" name = "edit_profile">  
    </form>
    </body>
</html>
