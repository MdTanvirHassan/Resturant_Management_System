<?php
if(isset($_GET['user_app']) && isset($_GET['date'])  && isset($_GET['stuff']))
{
    include "localhost.php";
    $x = $_GET['user_app'];
    $y = $_GET['date'];
    $z = $_GET['stuff'];
    $sql = "SELECT * FROM `persons_stuff` WHERE `username` = '$z'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1)
    {
        $row = mysqli_fetch_assoc($result);
        $n =  $row['phonenumber'];
        $sql = "UPDATE `confirm_order` SET `Delivery_boy`='$z',`Delivery_Number`='$n' WHERE `username` = '$x' AND `order_date` = '$y'";
        if(mysqli_query($conn, $sql))
        {
            header("location:afterlogin stuff panel.php?Order=$z");
        }
    }
}
if(isset($_GET['user_done']) && isset($_GET['date'])  && isset($_GET['stuff']))
{
    include "localhost.php";
    $x = $_GET['user_done'];
    $y = $_GET['date'];
    $z = $_GET['stuff'];
    $sql = "INSERT INTO re_order(`username`, `food_name`, `quantity`, `price`) SELECT `username`, `food_name`, `quantity`, `price` FROM confirm_order WHERE `username` = '$x' AND `order_date` = '$y'";
    if(mysqli_query($conn, $sql))
    {
        $sql = "DELETE FROM `confirm_order` WHERE `username` = '$x' AND `order_date` = '$y'";
        if(mysqli_query($conn, $sql))
        {
            header("location:afterlogin stuff panel.php?Order=$z");
        }
    }
}
if(isset($_GET['user_done_pay']) && isset($_GET['date'])  && isset($_GET['stuff']))
{
    include "localhost.php";
    $x = $_GET['user_done_pay'];
    $y = $_GET['date'];
    $z = $_GET['stuff'];
    $sql = "UPDATE `confirm_order` SET `Payment`= '1' WHERE `username` = '$x' AND `order_date` = '$y'";
    if(mysqli_query($conn, $sql))
    {
        $sql = "INSERT INTO re_order(`username`, `food_name`, `quantity`, `price`) SELECT `username`, `food_name`, `quantity`, `price` FROM confirm_order WHERE `username` = '$x' AND `order_date` = '$y'";
        if(mysqli_query($conn, $sql))
        {
            $sql = "DELETE FROM `confirm_order` WHERE `username` = '$x' AND `order_date` = '$y'";
            if(mysqli_query($conn, $sql))
            {
                header("location:afterlogin stuff panel.php?Order=$z");
            }
        }
    }
}
?>