<?php
if(isset($_GET['pannel']))
{
    include "localhost.php";
    if($_GET['pannel']==='Admin')
    {
        include "localhost.php";
        $sql = "SELECT * FROM admin WHERE login_status='1'";
        $result = mysqli_query($conn, $sql);
        mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0)
        {
            $row = mysqli_fetch_assoc($result);
            $admin = $row['username'];
            header("location:afterlogin admins panel.php?admin=$admin");
        }
        else
        {
            header("location:admin.php");
        }
    }
    elseif($_GET['pannel']==='Stuff')
    {
        include "localhost.php";
        $sql = "SELECT * FROM `persons_stuff` WHERE login_status='1' AND position NOT LIKE '%Chef'";
        $result = mysqli_query($conn, $sql);
        mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0)
        {
            $row = mysqli_fetch_assoc($result);
            $stuff = $row['username'];
            header("location:afterlogin stuff panel.php?stuff=$stuff");
        }
        else
        {
            header("location:stuff.php");
        }
    }
    elseif($_GET['pannel']==='Chef')
    {
        include "localhost.php";
        $sql = "SELECT * FROM `persons_stuff` WHERE login_status='1' AND position LIKE '%Chef'";
        $result = mysqli_query($conn, $sql);
        mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0)
        {
            $row = mysqli_fetch_assoc($result);
            $stuff = $row['username'];
            header("location:afterlogin chef panel.php?chef=$stuff");
        }
        else
        {
            header("location:chef.php");
        }
    }
}

?>