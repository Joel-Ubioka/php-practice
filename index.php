<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>REGISTRATION PAGE</h1>
    <?php
        /*if(isset($_GET['error']))
        {
            if($_GET['error']=='no_name')
            {
                echo "<p style='color:red; font-weght:bold '> Enter your name</p>";
            }

            elseif($_GET['error']=='no_email')
            {
                echo "<p style='color:red; font-weght:bold '> Enter your email</p>";
            }

            elseif($_GET['error']=='no_gender')
            {
                echo "<p style='color:red; font-weght:bold '> Select your gender</p>";
            }
        }
        
        
        $name_error="";
        $email_error="";
        $gendererror="";
           
        */
        
        $name_error = $email_error = $gender_error = "";

        if(isset($_POST['submit']))
        {
            $name = htmlspecialchars(trim($_POST['name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $website = htmlspecialchars(trim($_POST['website']));

            if(isset($_POST['gender']))
            {
                $gender = htmlspecialchars(trim($_POST['gender'])); 
            }
            
            $comment = htmlspecialchars(trim($_POST['comment']));

            if(empty( $name))
            {
                $name_error="You must enter your name before submitting";
            }

            if(empty(  $email))
            {
                $email_error="You must enter your email before submitting";
            }

            if(empty( $gender))
            {
                $gender_error="You must select your gender before submitting";
            }

            if(empty($name_error)  && empty($email_error)  && empty($gender_error))
            {
                echo "<span style='color:green; font-weght:bold; '>Successfully Registered </span>";
            }
        }
       
        
        ?>
    <br><br>
    <form method="POST">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name"
            value="<?php if(isset($_POST['name'])) { echo $name; } ?>"><br>
        <?php  echo "<span style='color:red; font-weght:bold; '>$name_error</span>"; ?>
        <br><br>


        <label for=" email">Email</label><br><br>
        <input type="email" id="email" name="email" placeholder="Enter your email"
            value="<?php if(isset($_POST['email'])) { echo $email; } ?>">

        <br>
        <?php  echo "<span style='color:red; font-weght:bold; '>$email_error</span>"; ?>

        <br><br>


        <label for="website">Website</label><br><br>
        <input type="website" id="website" name="website" placeholder="Enter your website"
            value="<?php if(isset($_POST['name'])) { echo $name; } ?>">
        <br><br>
        <label for="gender">Gender</label><br><br>
        <input type="radio" id="gender" value="male" name="gender">Male <br>
        <input type="radio" id="gender" value="female" name="gender">Female <br>
        <?php  echo "<span style='color:red; font-weght:bold; '>$gender_error</span>"; ?>
        <br><br>

        <label for="comment">Comment</label><br><br>
        <textarea name="comment" id="comment" cols="20"
            rows="5"> <?php if(isset($_POST['name'])) { echo $name; } ?></textarea>

        <br><br>

        <button type="submit" name="submit">Register</button>
    </form>
</body>

</html>
</body>

</html>
</body>

</html>