<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    include "localhost.php";
    $sql = "INSERT INTO `food_item`(`food_name`, `description`, `catagory`, `price`, `image_path`, `rating`) SELECT `food_name`, `description`, `catagory`, `price`, `image_path`, `rating` FROM pending_food_item WHERE food_id='$id'";
    if ($conn->query($sql) === TRUE) 
    {
        $sql1 = "DELETE FROM `pending_food_item` WHERE food_id = '$id'";
        if($conn->query($sql1) === TRUE)
        {
            header("location: afterlogin admins panel.php?food_item=food_item");
        }
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>