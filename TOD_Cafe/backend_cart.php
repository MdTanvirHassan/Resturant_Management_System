<?php
include "localhost.php";
session_start();
if(isset($_GET['add_cart']) && isset($_GET['cat']) && isset($_GET['price']))
{
    $cat = $_GET['cat'];
    $item = $_GET['add_cart'];
    $price = $_GET['price'];
    $sql = "SELECT * FROM `food_cat` WHERE start_time<=CURRENT_TIME AND end_time>=CURRENT_TIME";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)==0) 
    {
        $message = "THE RESTAURENT IS CLOSED";        
    }
    else
    {
        $row = mysqli_fetch_assoc($result);
        if($row['catagory']==$cat)
        {
            $sql = "SELECT * FROM persons_cust WHERE login_status=1";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1)
            {
                $row = mysqli_fetch_assoc($result); 
            }
            if(isset($row['username']))
            {
                $user = $row['username'];
                $sql = "SELECT * FROM pending_order WHERE food_name='$item'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 1) 
                {
                    $row = mysqli_fetch_assoc($result);
                    $price = $row['price']+$price;
                    $qtn = $row['quantity']+1;
                    $sql = "UPDATE `pending_order` SET `quantity` = '$qtn', `price`='$price' WHERE `pending_order`.`username` = '$user' AND food_name='$item'";
                    if(mysqli_query($conn, $sql))
                    {
                        $message = "The quantity of item is added <a class = 'text-success' href='show_cart.php'>click here</a>";
                    }
                }
                else if(mysqli_num_rows($result) == 0)
                {
                    $sql = "SELECT * FROM food_item WHERE food_name='$item'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $price = $row['price'];
                    $sql1 = "INSERT INTO `pending_order`(`username`, `food_name`, `price`) VALUES ('$user','$item','$price')";
                    if(mysqli_query($conn, $sql1))
                    {
                        $message = "The item is added <a class = 'text-success' href='show_cart.php'>click here</a>";
                    }
                    else 
                    {
                        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            }
            else
            {
                $message = "LOG IN First <a class = 'text-success' href='login.php'>click here</a>";
            }
        }
        else
        {
            $message = "This is not time of $cat. It is the time of ".$row['catagory']."<a class = 'text-success' href='Menu.php?cat=".$row['catagory']."'>click here</a>"; 
        }
    }
      
    mysqli_close($conn);
    header("location: Menu.php?cat=$cat&message=$message", true, 303);
}
?>