<?php
$servername = "127.1.1.1";
$username = "root";
$password = "";
$dbname = "test1";
$conn = new mysqli($servername, $username, $password, $dbname);
if (isset($_POST['login_user'])) 
{
    $user = $_POST['uname'];
    $pass = $_POST['password'];
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM persons_cust WHERE username= '$user' AND pass = '$pass'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        $sql = "UPDATE persons_cust SET login_status= TRUE WHERE username = '$user'";
        mysqli_query($conn, $sql); 
        header("location: restaurantpart1.php");       
    }
    else 
    {
        echo "$user Doesn't exist Here!";
    }

}

?>
