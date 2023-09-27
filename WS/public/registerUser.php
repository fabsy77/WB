<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register user</title>
</head>
<body>
    <form action="formRegisterUser.php" method="post">
    <div class="container">
            <label for="uemail"><b>Email</b></label><br>
            <input type="email" placeholder="Email" name="email" required><br>
            <label for="uname"><b>First Name </b></label><br>
            <input type="text" placeholder="First Name" name="first_name" required><br>
            <label for="uname"><b>Last Name </b></label><br>
            <input type="text" placeholder="Last Name" name="last_name" required><br>
            <label for="ubirthday"><b>Date of birth</b></label><br>
            <input type="date" name="birthday" required><br>
            <label for="psw"><b>Password</b></label><br>
            <input type="password" placeholder="Enter Password" name="psw" required><br>
            <label for="repeat_psw"><b>Repeat password</b></label><br>
            <input type="password" placeholder="Repeat password" name="repeat_psw" required><br><br>
            
            <?php include('../view/msg.php');?>

            <p>
            Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character

            </p>


        <button type="submit">Register</button>
          
         </div>

    </form>
    
</body>
</html>