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

$file = $_FILES['profile_picture'];
$file_name = $_FILES['profile_picture'] ['name'];
$file_tmp_name = $_FILES['profile_picture'] ['tmp_name'];
$file_size = $_FILES['profile_picture'] ['size'];
$file_error = $_FILES['profile_picture'] ['error'];
$file_type = $_FILES['profile_picture'] ['type'];

$exploded_file = explode('.',$file_name);
?>





    <h1>UPLOAD YOUR PROFILE PIC</h1><br><br>
    <p>File allowed *.JPG *.JPEG *.PNG *.GIF</p>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="profile_picture" class="picture_control"><br><br>
        <button type="submit" class="picture_button" name="upload">Upload </button>
    </form>
</body>

</html>