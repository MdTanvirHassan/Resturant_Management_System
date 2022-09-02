<?php
include "localhost.php";
if(isset($_GET['red_qtn']) && isset($_GET['user']))
{
    $user = $_GET['user'];
    $item = $_GET['red_qtn'];
    $sql = "SELECT pending_order.price AS pfn, food_item.price AS ffn, quantity FROM `pending_order`, food_item WHERE pending_order.food_name =food_item.food_name AND `pending_order`.`username` = '$user' AND pending_order.food_name='$item'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) 
    {
        $row = mysqli_fetch_assoc($result);
        $price = $row['pfn']- $row['ffn'];
        $qtn = $row['quantity']-1;
        if($qtn==0)
        {
            $sql = "DELETE FROM pending_order WHERE `pending_order`.`username` = '$user' AND food_name='$item'";
            if(mysqli_query($conn, $sql))
            {
                header("location:show_cart.php");
            }
        }
        else
        {
            $sql = "UPDATE `pending_order` SET `quantity` = '$qtn', `price`='$price' WHERE `pending_order`.`username` = '$user' AND food_name='$item'";
            if(mysqli_query($conn, $sql))
            {
                header("location:show_cart.php");
            }
        }
    }
}
else if(isset($_GET['add_qtn']) && isset($_GET['user']))
{
    $user = $_GET['user'];
    $item = $_GET['add_qtn'];
    $sql = "SELECT pending_order.price AS pfn, food_item.price AS ffn, quantity FROM `pending_order`, food_item WHERE pending_order.food_name =food_item.food_name AND `pending_order`.`username` = '$user' AND pending_order.food_name='$item'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) 
    {
        $row = mysqli_fetch_assoc($result);
        $price = $row['pfn']+ $row['ffn'];
        $qtn = $row['quantity']+1;
        $sql = "UPDATE `pending_order` SET `quantity` = '$qtn', `price`='$price' WHERE `pending_order`.`username` = '$user' AND food_name='$item'";
        if(mysqli_query($conn, $sql))
        {
            header("location:show_cart.php");
        }
    }
}
else if(isset($_GET['rem_qtn']) && isset($_GET['user']))
{
    $user = $_GET['user'];
    $item = $_GET['rem_qtn'];
    $sql = "DELETE FROM pending_order WHERE `pending_order`.`username` = '$user' AND food_name='$item'";
    if(mysqli_query($conn, $sql))
    {
        header("location:show_cart.php");
    }

}
else if(isset($_GET['reload_qtn']) && isset($_GET['user']))
{
    $user = $_GET['user'];
    $item = $_GET['reload_qtn'];
    $sql = "INSERT INTO pending_order(`username`, `food_name`, `quantity`, `price`) SELECT `username`, `food_name`, `quantity`, `price` FROM re_order WHERE `username` = '$user' AND `date_done` = '$item'";
    if(mysqli_query($conn, $sql))
    {
        header("location:show_cart.php");
    }

}
else if(isset($_GET['cancel_qtn']) && isset($_GET['user']))
{
    $user = $_GET['user'];
    $item = $_GET['cancel_qtn'];
    echo "<!DOCTYPE html>
    <html>
        <head>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Delete Page</title>
            <link rel='stylesheet' href='style.css'>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
            <script src='https://kit.fontawesome.com/ee1af068c0.js'></script>
        </head>
        <body>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
        <div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
                Do You Really Want To Cancel Your Order? It will take 10% Cancelation Charge
            </div><br>
            <a href='Operation_Cart.php?user=$user&conn_cancel_order=$item' class='btn btn-success'>Yes</a>
            <a href='show_cart.php?user=$user' class='btn btn-danger'>No</a>
        </div>       
        </body>
    </html>";
    /*$sql = "INSERT INTO pending_order(`username`, `food_name`, `quantity`, `price`) SELECT `username`, `food_name`, `quantity`, `price` FROM re_order WHERE `username` = '$user' AND `date_done` = '$item'";
    if(mysqli_query($conn, $sql))
    {
        header("location:show_cart.php");
    }*/
}
else if(isset($_GET['conn_cancel_order']) && isset($_GET['user']))
{
    $user = $_GET['user'];
    $item = $_GET['conn_cancel_order'];
    $sql = "SELECT * FROM persons_cust WHERE login_status=1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1)
    {
      $row = mysqli_fetch_assoc($result); 
    }
    $user = $row['username'];
    $dis = $row['discount'];
    $can = $row['cancel_charge'];
    $email = $row['email'];
    $sql = "SELECT SUM(`price`) AS totalprice FROM `confirm_order` WHERE username='$user' AND `Payment_option`='PayPal'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $totalprice = $row['totalprice'] - ($row['totalprice']*($dis/100)) + $can;
    $charge = $totalprice*0.1;
    echo $charge;
    $recv = $email;
    $money = $totalprice - $charge;
    $send = "aongshu@gmail.com";
    if($send != $recv)
    {
        session_unset();
        session_destroy();
        $sql = "SELECT * FROM `paypal` WHERE `email` = '$send'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $n = $row['amount'] - $money;
        $sql = "UPDATE `paypal` SET `amount`='$n' WHERE `email`='$send'";
        $subject = "Payment By PayPal";
        $headers = ["MIME-Version:1.0", "Content-type:text/html", "From:todcafe.bd.com@gmail.com", ];
        $headers = implode("\r\n", $headers);
        $body = "<!DOCTYPE html>
            <html>
                <head>
                    <title>Profile Card</title>
                    <style>
                        *{
                            margin: 0;
                            padding: 0;
                            box-sizing: border-box;
                            font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                        }
                        body{
                            display: flex;
                            height: 100vh;
                            justify-content: center;
                            align-items: center;
                            padding: 10px;
                        }
                        .container{
                            max-width: 700px;
                            width: 100%;
                            background: #fff;
                            padding: 25px 30px;
                            border-radius: 5px;
                            background: linear-gradient(120deg, rgb(106, 158, 230), rgb(8, 217, 245) );
                            justify-content:space-between;
                        }
                        .container h1{
                            font-size: 36px;
                            font-weight: 500;
                            position: relative;
                            display: inline;
                        }
                        .container h2{
                            font-size: 24px;
                            font-weight: 500;
                            position: relative;
                            margin-bottom: 10px;
                            text-decoration: underline;
                            display: inline;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <h1>PayPal</h1>
                        <div class='title'>
                            <h2>Taka $money has been deducted from your account!</h2>
                        </div>
                    </div>
                </body>
            </html>";
        if (mail($send, $subject, $body, $headers))
        {
            if(mysqli_query($conn, $sql))
            {
                $sql = "SELECT * FROM `paypal` WHERE `email` = '$recv'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $n = $row['amount'] + $money;
                $sql = "UPDATE `paypal` SET `amount`='$n' WHERE `email`='$recv'";
                if(mysqli_query($conn, $sql))
                {
                    $subject = "Payment By PayPal";
                    $headers = ["MIME-Version:1.0", "Content-type:text/html", "From:todcafe.bd.com@gmail.com", ];
                    $headers = implode("\r\n", $headers);
                    $body = "<!DOCTYPE html>
                                <html>
                                    <head>
                                        <title>Profile Card</title>
                                        <style>
                                            *{
                                                margin: 0;
                                                padding: 0;
                                                box-sizing: border-box;
                                                font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                                            }
                                            body{
                                                display: flex;
                                                height: 100vh;
                                                justify-content: center;
                                                align-items: center;
                                                padding: 10px;
                                            }
                                            .container{
                                                max-width: 700px;
                                                width: 100%;
                                                background: #fff;
                                                padding: 25px 30px;
                                                border-radius: 5px;
                                                background: linear-gradient(120deg, rgb(106, 158, 230), rgb(8, 217, 245) );
                                                justify-content:space-between;
                                            }
                                            .container h1{
                                                font-size: 36px;
                                                font-weight: 500;
                                                position: relative;
                                                display: inline;
                                            }
                                            .container h2{
                                                font-size: 24px;
                                                font-weight: 500;
                                                position: relative;
                                                margin-bottom: 10px;
                                                text-decoration: underline;
                                                display: inline;
                                            }
                                        </style>
                                    </head>
                                    <body>
                                        <div class='container'>
                                            <h1>PayPal</h1>
                                            <div class='title'>
                                                <h2>Taka $money has been added from your account!</h2>
                                            </div>
                                        </div>
                                    </body>
                                </html>";
                if (mail($recv, $subject, $body, $headers))
                {
                    $sql = "SELECT * FROM persons_cust WHERE login_status=1";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) == 1)
                    {
                        $row = mysqli_fetch_assoc($result); 
                    }
                    $user = $row['username'];
                    $sql = "INSERT INTO cancel_order SELECT * FROM confirm_order WHERE `username`= '$user' AND `order_date` = '$item'";
                    if(mysqli_query($conn, $sql))
                    {
                        $sql = "DELETE FROM `confirm_order` WHERE `username` = '$user' AND `order_date` = '$item'";
                        if(mysqli_query($conn, $sql))
                        {
                            header("location:restaurantpart1.php");
                        }
                    }
                    
                } 
                else 
                {
                    echo "Email sending failed...";
                }

            }
        }
        }
    }
    else
    {
        $message = "Same Email";
        header("location:show_cart.php?message=$message");
    }
}
?>