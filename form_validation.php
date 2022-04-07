<?php

$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$website = htmlspecialchars(trim($_POST['website']));
$gender = htmlspecialchars(trim($_POST['gender']));
$comment = htmlspecialchars(trim($_POST['comment']));

if(isset($_POST['submit']))
{
    if(empty($name))
   {
       header('location:index.php?error=no_name');
   }

     elseif(empty($email))
   {
       header('location:index.php?error=no_email');
   }

     elseif(empty($gender))
   {
       header('location:index.php?error=no_gender');
   }
}


?>