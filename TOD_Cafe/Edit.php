<?php
include "localhost.php";
if(isset($_GET['user']))
{
    session_start();
    $_SESSION['user'] = $_GET['user'];
} 
if(isset($_POST['edit_profile']))
{
    session_start();
    $option  = $_POST['option'];
    $change = $_POST['Change'];
    $user = $_SESSION['user'];
    session_unset();
    session_destroy();
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "UPDATE persons_cust SET $option ='$change' WHERE username='$user'";

    if (mysqli_query($conn, $sql)) 
    {
        header("location: restaurantpart1.php");
    } 
    else 
    {
        echo "Error updating record: " . mysqli_error($conn);
    }

}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Page</title>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,700&family=Poppins:wght@500&display=swap');
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'poppins', sans-serif;
            }
            body{
                display: flex;
                height: 100vh;
                justify-content: center;
                align-items: center;
                padding: 10px;
                background: linear-gradient(135deg, red);
            }
        </style>
    </head>
    <body>
    <form action = "Edit.php" method = "POST">
    <select class="form-select" aria-label="Disabled select example" name="option" required>
        <option selected disabled>Enter Your Edit Item</option>
        <option value="fullname">Name</option>
        <option value="username">User Name</option>
        <option value="pass">Password</option>
        <option value="email">E-mail</option>
        <option value="phonenumber">Phone Number</option>
    </select><br>
    <label for="exampleDataList" class="form-label">Enter Your Change</label>
    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="" name = "Change" required><br>
    <input type = "submit" class = "btn btn-primary" value = "Update" name = "edit_profile">  
    </form>
    </body>
</html>
