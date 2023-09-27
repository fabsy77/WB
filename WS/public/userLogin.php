<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css//login.css">
    <title>Document</title>
</head>
<body>
    <form action="formUserLogin.php" method="post">
        <div class="container">
            <label for="uname"><b>Email</b></label>
            <input type="text" placeholder="Email" name="uemail" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Login</button>


           <p>
                <a href="registerUser.php" style="font-size: 20px;">Register</a>
           </p>
         </div>

        <div class="container">
            
            <p>
            <?php
                include('../view/msg.php');
                
            ?>
            </p>
            
        </div>
    </form>  
</body>
</html>