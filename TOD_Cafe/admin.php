<?php
$servername = "127.1.1.1";
$username = "root";
$password = "";
$dbname = "test1";
$conn = new mysqli($servername, $username, $password, $dbname);
if (isset($_POST['login'])) 
{
    $user = $_POST['uname'];
    $pass = $_POST['password'];
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM admin WHERE username= '$user' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        $sql1 = "UPDATE admin SET login_status = '1' WHERE username = '$user'";
        if(mysqli_query($conn, $sql1))
        {
            header("location: afterlogin admins panel.php?admin=$user");
        }       
    }
    else 
    {
        echo "$user Doesn't exist Here!";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="CSS/admin.css">
</head>
<body>
    <div class="center">
        <h1>Admin Login</h1>
        <form action="admin.php" method="post">
            <div class="input-box">
                <input type="text" name = "uname" required>
                <span></span>
                <label class="details">User Name:</label>
            </div>
            <div class="input-box">
                <input type="password" name = "password" required>
                <span></span>
                <label class="details">Password:</label>
            </div>
            <div class="pass"><a href="#">Forgot Password?</a></div>
            <input type="submit" value="Login" name = "login">
            <div class="sign_up">Don't have an account? <a href="registration.html">SIGN UP</a></div>
        </form>
    </div>       
</body>
</html>