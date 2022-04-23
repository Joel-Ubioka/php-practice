<?php 

// DISPLAY DETAILS OF A PARTICULAR INDIVIDUAL

if(isset($_POST['display']))
{
    
    $email = htmlspecialchars(trim($_POST['email']));
             require "includes/practice_db.php";
        $sql = "SELECT id, name, email FROM students_table  where email = '$email'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    echo "<table border = '1'>";
                    echo "
                         <th>S/N</th>
                         <th>Reg No.</th>
                         <th>Name</th>
                         <th>Email</th>
                         
                    
                    ";

                    $id = 0;
                    while ($retrieve = mysqli_fetch_array($result))
                    {
                        
                      $id += 1;
                        $reg = $retrieve['id'];
                        $name = $retrieve['name'];
                        $email = $retrieve['email'];
                       

                        echo "
                             <tr>
                                  <td>$id</td>
                                  <td>$reg</td>
                                  <td>$name</td>
                                  <td>$email</td>
                               
                             

                             </tr>
                             ";
                    }
                    echo "</table>";
                }
            }

            // DISPLAY ALL REGISTERED PERSONS


            if(isset($_POST['display_all']))
{
    
    
             require "includes/practice_db.php";
        $sql = "SELECT * FROM students_table  ORDER BY name ";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    echo "<table border = '1'>";
                    echo "
                         <th>S/N</th>
                         <th>Reg No.</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>website</th>
                         <th>gender</th>
                         <th>comment</th>
                         
                    
                    ";

                    $id = 0;
                    while ($retrieve = mysqli_fetch_array($result))
                    {
                        
                      $id += 1;
                        $reg = $retrieve['id'];
                        $name = $retrieve['name'];
                        $email = $retrieve['email'];
                        $website = $retrieve['website'];
                        $gender = $retrieve['gender'];
                        $comment = $retrieve['comment'];
                       

                        echo "
                             <tr>
                                  <td>$id</td>
                                  <td>$reg</td>
                                  <td>$name</td>
                                  <td>$email</td>
                                  <td>$website</td>
                                  <td>$gender</td>
                                  <td>$comment</td>
                               
                             

                             </tr>
                             ";
                    }
                    echo "</table>";
                }
            }

            // DELETE A REGISTERED DETAIL


            if(isset($_POST['delete']))
            {
                require "includes/practice_db.php";
                $email = htmlspecialchars(trim($_POST['email']));
                $sql = "DELETE from students_table where email = '$email'";
                if(mysqli_query($conn, $sql))

                {
                    echo "<span style='color:green; font-weight:bold; '>Succesfully deleted</span>"; 
                }
                else
                {
                    echo "<span style='color:red; font-weight:bold; '>Failed</span>"; 
                }
            }
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h4>To see a student data, click below</h4>
    <form method="POST">
        <input type="email" name="email" placeholder="Enter your email">
        <button type="submit" name="display">Submit </button>
    </form>
    <br><br><br>

    <h4>To see all students' , data click below</h4>
    <form method="POST">
        <button type="submit" name="display_all">Submit </button>
    </form>
    <br><br><br>

    <h4>Click below to delete</h4>
    <form method="POST">
        <input type="email" name="email" placeholder="Enter your email">
        <button type="submit" name="delete">Delete </button>
    </form>
</body>

</html>