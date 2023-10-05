<?php
session_start();
include("./php/config.php");
if(!isset($_SESSION['valid']))
{
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/index.css">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>
   
    <div class="right-links">
        <a href="">Change Profile</a>
        <a href="./php/logout.php"> <button class="btn">Log Out</button></a>
    </div>
 </div>
 <div class="container">
    <div class="box form-box">
        <?php
        if(isset($_POST['submit'])){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $age=$_POST['age'];

            $id=$_SESSION['id'];

            $edit_query=mysqli_query($con,"UPDATE users SET Username='$username',Email='$email',Age='$age' WHERE ID=$id") or die("error occoured");

            if($edit_query){
                echo "<div class='message'>
                <p>Profile Updated successfuly!</p>
                </div><br>";
                echo "<a href='index.php'><Button class='btn'>Go Back</Button></a>";
            }
        }
        else{
            $id=$_SESSION['id'];
            $query=mysqli_query($con,"SELECT *FROM users WHERE Id=$id");
            while($result=mysqli_fetch_assoc($query)){
                $res_Uname=$result['Username'];
                $res_Email=$result['Email'];
                $res_Age=$result['Age'];
            }
        ?>
        <header>Change Profile</header>
        <form action="#" method="post">
            <div class="field input">
                <label for="Username">Username</label>
                <input type="text" name="username" value="<?php echo $res_Uname?>" id="" required>
            </div>
            <div class="field input">
                <label for="Email">Email</label>
                <input type="email" name="email" value="<?php echo $res_Email?>" required>
            </div>
            <div class="field input">
                <label for="Age">Age</label>
                <input type="number" name="age" min="5" max="100" value="<?php echo $res_Age?>"required>
            </div>
            <div class="field">
                <input type="submit" name="submit" value="Update"id="" class="btn" required>
            </div>
            
        </form>
    </div>
    <?php } ?>
</div>
</body>
</html>