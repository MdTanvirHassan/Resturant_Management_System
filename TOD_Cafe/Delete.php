<?php
include "localhost.php";
if(isset($_GET['user']))
{
    $user = $_GET['user'];
}
if(isset($_GET['conn_user']))
{
    $conn_user = $_GET['conn_user'];
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT pass, email FROM persons_cust WHERE username= '$conn_user'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0)
    {
        session_start();
        $OTP = rand(100000, 999999);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $email = $_SESSION['email'];
        $_SESSION['OTP'] = $OTP;
        $_SESSION['user'] = $conn_user;
        $subject = "Delete Confirmation";
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
            header("Location: OTP delete.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Page</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/ee1af068c0.js"></script>
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            Do You Really Want To Delete Your Account?
        </div><br>
        <button onclick="location.href='delete.php?conn_user=<?php echo $user ?>'" type="button" class="btn btn-success">Yes</button>
        <button onclick="location.href='Profile.php?user=<?php echo $user ?>'" type="button" class="btn btn-danger">No</button>
    </div>       
    </body>
</html>