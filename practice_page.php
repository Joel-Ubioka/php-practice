<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
if(isset($_POST['upload']))
{
    $file = $_FILES['profile_picture'];
    $file_name = $_FILES['profile_picture'] ['name'];
    $file_tmp_name = $_FILES['profile_picture'] ['tmp_name'];
    $file_size = $_FILES['profile_picture'] ['size'];
    $file_error = $_FILES['profile_picture'] ['error'];
    $file_type = $_FILES['profile_picture'] ['type'];

    $exploded_file = explode('.',$file_name);
    $file_ext = strtolower(end($exploded_file));
    $allowed_ext = array('jpg', 'jpeg', 'png','gif');

    if(in_array( $file_ext, $allowed_ext ))
    {
        if( $file_error == 0)
        {
            if( $file_size < 1048576)
            {
            $file_name_new = uniqid('', true).".". $file_ext;
            $file_destination = 'images/'.$file_name_new;
            if(move_uploaded_file($file_tmp_name , $file_destination)) 
            {
                echo "<p style='color:green;'>succesfully uploaded</p>";
                
            }
            else
            {
                echo  "<p style='color:red;'>Failed to upload</p>"; 
            }
            }
            else
            {
                echo "<p style='color:red;'>You can not allowed to upload file more than 1mb</p>"; 
            }
        }  
        else
        {
            echo "<p style='color:red;'>Error while uploading the file</p>"; 
        }  
    }
    else
    {
        echo "<p style='color:red;'>You can not upload a file of this type</p>"; 
    }
}
?>





    <h1>UPLOAD YOUR PROFILE PIC</h1><br><br>
    <p>File allowed *.JPG *.JPEG *.PNG *.GIF</p>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="profile_picture" class="picture_control"><br><br>
        <button type="submit" class="picture_button" name="upload">Upload </button>
    </form>
</body>

</html>