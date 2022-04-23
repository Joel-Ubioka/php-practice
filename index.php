<?php session_start()  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php //include "./includes/header.php" ?>

    <br><br>
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
        
         $invalid_email = $only_letters = $name_error = $email_error = $gender_error = "";

        if(isset($_POST['submit']))
        {

            require "includes/practice_db.php";
            $name = htmlspecialchars(trim($_POST['name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $website = htmlspecialchars(trim($_POST['website']));

            $_SESSION['name'] =  $name; 
            
            $_SESSION['email'] =  $email; 
            
            $_SESSION['website'] =  $website; 
        

            if(isset($_POST['gender']))
            {
                $gender = htmlspecialchars(trim($_POST['gender'])); 
            }
            
            $comment = htmlspecialchars(trim($_POST['comment']));

            if(empty( $name))
            {
                $name_error="You must enter your name before submitting";
            }

            if(!preg_match("/^[a-zA-Z ]*$/", $name))
            {
                $only_letters="You are required to enter only letters";
            }

            if(empty(  $email))
            {
                $email_error="You must enter your email before submitting";
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $invalid_email="Enter correct email address";
            }

          
          

            if(empty( $gender))
            {
                $gender_error="You must select your gender before submitting";
            }

           

            else
            {
                /*
                $sql = "INSERT INTO students_table ( name, email, website, gender, comment) VALUES('$name', '$email', '$website', '$gender', '$comment')";
              
                if(mysqli_query($conn, $sql))
                {
                    echo "<span style='color:green; font-weight:bold; '>Succesfully Registered</span>";
                }

                else
                {
                    echo "<span style='color:red; font-weight:bold; '>Registration Failed</span>";
                }
                 */
                $sql = "SELECT  email FROM students_table  where email = '$email'";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0)
                {
                   // echo "<span style='color:red; font-weight:bold; '>You are already registered</span>";
                    /*
                   $sql = "UPDATE students_table SET name = '$name', email = '$email', website = '$website', gender= '$gender', comment = '$comment' where email = '$email'0";
                   if(mysqli_query($conn, $sql))
                   {
                    echo "<span style='color:green; font-weight:bold; '>Succesfully Updated</span>"; 
                   }
                   else
                   {
                    echo "<span style='color:red; font-weight:bold; '>Update Failed</span>"; 
                   }
                   */

                   $sql ="UPDATE students_table SET name = ?, email = ?, website =?, gender = ?, comment = ? where email = '$email'";
                   $conn_init = mysqli_stmt_init($conn);
                   if(mysqli_stmt_prepare( $conn_init,   $sql))
                   {
                       mysqli_stmt_bind_param($conn_init, "sssss", $name, $email, $website, $gender, $comment);
                       mysqli_stmt_execute($conn_init);

                       echo "<span style='color:green; font-weight:bold; '>Succesfully Updated</span>"; 
                   }
                   else
                   {
                    echo "<span style='color:red; font-weight:bold; '>Update Failed</span>";  
                   }
                   mysqli_close($conn);
                }
                else
                {
                 
                $sql = "INSERT INTO students_table ( name, email, website, gender, comment) VALUES(?,?,?,?,?)";
                $conn_stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($conn_stmt, $sql))
                {
                    echo "<span style='color:red; font-weight:bold; '>Connection Failed</span>";
                }
                else
                {
                   mysqli_stmt_bind_param($conn_stmt, "sssss", $name, $email, $website, $gender, $comment);
                   mysqli_stmt_execute($conn_stmt); 
                   
                   echo "<span style='color:green; font-weight:bold; '>Succesfully Registered</span>";
                }
                mysqli_close($conn);
               
            }
               
            }
            
        }
       
        
        ?>
    <span style='color:red; font-weight:bold; '>*</span><span font-weight:bold; '>  Required</span>
    <br><br>
    <form method="POST">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name"
            value="<?php if(isset($_POST['name'])) { echo $name; } ?>"> <span
            style=' color:red; font-weight:bold; '>*</span><br>
        <?php  echo "<span style='color:red; font-weight:bold; '>$name_error</span>"; ?>
        <?php  echo "<span style='color:red; font-weight:bold; '>$only_letters</span>"; ?>
        <br><br>


        <label for=" email">Email</label><br><br>
        <input type="text" id="email" name="email" placeholder="Enter your email"
            value="<?php if(isset($_POST['email'])) { echo $email; } ?>">  <span style=' color:red; font-weight:bold; '>*</span>

        <br>
        <?php  echo "<span style='color:red; font-weight:bold; '>$email_error</span>"; ?>
        <?php  echo "<span style='color:red; font-weight:bold; '>$invalid_email</span>"; ?>

        <br><br>


        <label for="website">Website</label><br><br>
        <input type="text" id="website" name="website" placeholder="Enter your website"
            value="<?php if(isset($_POST['website'])) { echo $website; } ?>"><br>

        <br><br>
        <label for="gender">Gender</label>  <span style=' color:red; font-weight:bold; '>*</span><br><br>
        <input type="radio" id="gender" value="male" name="gender"
            <?php  if(isset($_POST['gender'])  && $gender == "Male" ) { echo "checked";}    ?>> Male <br>

        <input type="radio" id="gender" value="female" name="gender"
            <?php  if(isset($_POST['gender'])  && $gender == "Female" ) { echo "checked";}    ?>>Female <br>
        <?php  echo "<span style='color:red; font-weight:bold; '>$gender_error</span>"; ?> <br><br>

        <label for="comment">Comment</label><br><br>
        <textarea name="comment" id="comment" cols="20"
            rows="5"> <?php if(isset($_POST['comment'])) { echo $comment; } ?></textarea>

        <br><br>

        <button type="submit" name="submit">Register</button>
    </form>
</body>

</html>
</body>

</html>
</body>

</html>