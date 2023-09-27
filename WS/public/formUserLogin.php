<?php
    
    include('../class/User.php');
   

   
    if(isset($_POST['uemail']) && !empty($_POST['uemail']) && isset($_POST['psw']) && !empty($_POST['psw'])){

        $user = new User();//instanciando
        $userExist = $user->getUserByLoginAndPassword($_POST['uemail'], $_POST['psw'], 'user');

        if(!empty($userExist) && count($userExist) == 1){
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['user_info'] = $userExist;
          
            header('location: ../index.php');
        }
        else{
            session_start();

            $_SESSION['error_login'] = 'user or password incorrect';
            header('location: userLogin.php');

        }

    }


        
    


?>