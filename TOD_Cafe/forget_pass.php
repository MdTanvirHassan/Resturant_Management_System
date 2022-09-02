<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="center">
        <h1>Search Account</h1>
        <?php include "Backend_forget.php";?>
        <form action="forget_pass.php" method="post">
            <div class="input-box">
                <input type="text" name = "uname" required>
                <span></span>
                <label class="details">User Name:</label>
            </div>
            <div class="pass"><a href="forget_pass.php">Forgot Password?</a></div>
            <input type="submit" value="Search" name="forget_user">
            <div class="sign_up">Don't have an account? <a href="registration.php">SIGN UP</a></div>
        </form>
    </div>       
</body>
</html>