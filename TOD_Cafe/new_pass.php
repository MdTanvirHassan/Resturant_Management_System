<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="center">
        <h1>Change Your Password</h1>
        <?php include "Backend_con_pass.php"; ?>
        <form action="new_pass.php" method="post">
            <div class="input-box">
                <input type="password" name = "new_pass" required>
                <span></span>
                <label class="details">Old Password:</label>
            </div>
            <div class="input-box">
                <input type="password" name = "con_pass" required>
                <span></span>
                <label class="details">New Password:</label>
            </div>
            <div class="pass"><a href="#">Forgot Password?</a></div>
            <input type="submit" value="Update" name="Change_pass">
            <div class="sign_up">Don't have an account? <a href="registration.html">SIGN UP</a></div>
        </form>
    </div>       
</body>
</html>