<?php
include "localhost.php";
if(isset($_POST['insert_food']))
{
    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_Price'];
    $food_Desc = $_POST['Description'];
    $i_name = 'food_image';
    if(isset($_POST['Category']))
    {
        $food_cat  = $_POST['Category'];
        if(isset($_FILES[$i_name]))
        {
            include "ADD_PIC.php";
        }
        $sql = "INSERT INTO pending_food_item( food_name, description, catagory, price, image_path) 
                VALUES ('$food_name','$food_Desc','$food_cat','$food_price','$image_upload_path')";
        if ($conn->query($sql) === TRUE) 
        {
            header("location: afterlogin chef panel.php?chef=1");
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else
    {
        echo "Enter The Category Option";
    }
    
}
?>