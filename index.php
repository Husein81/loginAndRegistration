<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./style/index.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
            include("php/config.php");
            if(isset($_POST['submit'])){
                $email=mysqli_real_escape_string($con,$_POST['email']);
                $password=mysqli_real_escape_string($con,$_POST['password']);

                $result=mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password'") or die("Error occoured");
                $row =mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid']=$row['Email'];
                    $_SESSION['username']=$row['Username'];
                    $_SESSION['age']=$row['Age'];
                    $_SESSION['id']=$row['Id'];
                }
                else{
                echo "<div class='message'>
                    <p>Wrong Username or Password!</p>
                    </div><br>";
                echo "<a href='index.php'><Button class='btn'>Go back</Button></a>";
            }
            if(isset($_SESSION['valid'])){
                header("Location:home.php");
            }
        }else{
            ?>
            <header>Login</header>
            <form action="#" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="" required>
                </div>
                <div class="field">
                    <input type="submit" name="submit" value="Login"id="" class="btn" required>
                </div>
                <span class="links">Don't have account? <a href="register.php">Sign Up Now</a></span>
            </form>
        </div>
        <?php }?>
    </div>
    <script src="index.js"></script>
</body>

</html>