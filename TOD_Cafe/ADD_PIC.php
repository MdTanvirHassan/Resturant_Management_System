<?php
$image_name = $_FILES[$i_name]['name'];
$image_type = $_FILES[$i_name]['type'];
$image_temp_name = $_FILES[$i_name]['tmp_name'];
$image_error = $_FILES[$i_name]['error'];
$image_size = $_FILES[$i_name]['size'];
if($image_error===0)
{
    $image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
    $image_ex_lc = strtolower($image_ex);
    $allowed_exs = array("jpg", "jpeg", "png");
    if(in_array($image_ex_lc, $allowed_exs))
    {
        $new_image_name = uniqid('IMG-', TRUE).'.'.$image_ex_lc;
        $image_upload_path = 'uploads/'.$new_image_name;
        move_uploaded_file($image_temp_name, $image_upload_path);
    }
    else
    {
      echo "Wrong type file. Upload the file again!";
    }
}
else
{
    echo "Unknown problem use another picture";
}
?>