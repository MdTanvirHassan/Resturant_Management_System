<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Page</title>
        <link rel="stylesheet" href="registration.css">
        <script src="https://kit.fontawesome.com/ee1af068c0.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="title">Confirmation:</div>
            <?php include 'OTP_CONFIRM.php';?>
            <form action="OTP.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Enter The OTP:</span>
                        <input type="text" placeholder="Enter The OTP:" name = "OTP" required>
                    </div>
                <div class="button">
                    <input type="submit"  value="Confirm" name="OTP_user">
                </div>
            </form>
        </div>
    </body>
</html>