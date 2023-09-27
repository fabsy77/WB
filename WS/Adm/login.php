<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css//login.css">
    <title>Document</title>
</head>
<body>
    <form action="formLogin.php" method="post">
        <div class="container">
            <label for="uname"><b>Email</b></label>
            <input type="text" placeholder="Email" name="uemail" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Login</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
         </div>

        <div class="container">
            <button type="button" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
            <p>
            <?php
                session_start();
                if( isset($_SESSION['error_login']) && !empty($_SESSION['error_login'])){
                    echo($_SESSION['error_login']);
                    unset($_SESSION['error_login']);
                }
            ?>
            </p>
            
        </div>
    </form>  
</body>
</html>