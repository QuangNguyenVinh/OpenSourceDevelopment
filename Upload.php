<?php
if(isset($_FILES['image']))
{
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type= $_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.', $_FILES['image']['name'])));
    $expensions= array("jpeg","jpg","png");
    if(in_array($file_ext, $expensions)=== false)
    {
        $errors[]="Don't accept image files with this extension, please
    choose JPEG or PNG.";
    }
    if($file_size > 2097152)
    {
        $errors[]='File size should be 2MB';
    }
    if(empty($errors)==true)
    {
        move_uploaded_file($file_tmp,"D:\\MyExcercises\\PHP\\images\\".$file_name);
        echo "Upload File successfully!!!";
        echo "<br> File name: ". $_FILES['image']['name'];
        echo "<br> File size ". $_FILES['image']['size'];
        echo "<br> File type ". $_FILES['image']['type'];
    }
    else
    {
        print_r($errors);
    }
}
?>