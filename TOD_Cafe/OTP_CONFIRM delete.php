<?php
if(isset($_POST['OTP_user']))
{
    $servername = "127.1.1.1";
    $username = "root";
    $password = "";
    $dbname = "test1"; 
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    session_start();
    if($_SESSION['OTP']==$_POST['OTP'])
    {
        $user = $_SESSION['user'];
        $sql = "DELETE FROM persons_cust WHERE username = '$user'";
        if (mysqli_query($conn, $sql)) 
        {
            echo "Record deleted successfully";
            session_unset();
            session_destroy();
            header("Location: restaurantpart1.php");
        } 
        else
        {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
?>