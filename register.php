<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./style/index.css">
</head>
<body>
   
    <div class="container">
        <div class="box form-box"> 
        <?php
        include("php/config.php");
        if(isset($_POST["submit"])){
            $username=$_POST["username"];
            $email=$_POST["email"];
            $age=$_POST["age"];
            $password=$_POST['password'];
            
            $verify_query=mysqli_query($con,"SELECT Email From users WHERE Email='$email'");

            if(mysqli_num_rows($verify_query)!=0){
                echo "<div class='message'>
                    <p>This email used,Try another One!</p>
                    </div><br>";
                echo "<a href='javascript:self.history.back()'><Button class='btn'>Go back</Button></a>";
            }
            else{
                mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Error occured");
                echo "<div class='message'>
                    <p>Registration successfuly!</p>
                    </div><br>";
                echo "<a href='index.php'><Button class='btn'>Login Now</Button></a>";
            }
        }else{
        ?>
            <header>Sign Up</header>
            <form action="#" method="post">
                <div class="field input">
                    <label for="Username">Username</label>
                    <input type="text" name="username" id="" required>
                </div>
                <div class="field input">
                    <label for="Email">Email</label>
                    <input type="email" name="email" id="" required>
                </div>
                <div class="field input">
                    <label for="Age">Age</label>
                    <input type="number" name="age" min="5" max="100" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="" required>
                </div>
                <div class="field">
                    <input type="submit" name="submit" value="Register"id="" class="btn" required>
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php }?>
    </div>
    <script src="index.js"></script>
</body>

</html>