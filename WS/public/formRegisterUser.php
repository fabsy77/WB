<?php
//cria um novo usuario (usuario comum)
include('../class/User.php');

    if(isset($_POST) 
    && isset($_POST['email']) 
    && isset($_POST['first_name']) 
    && isset($_POST['last_name']) 
    && isset($_POST['birthday']) 
    && isset($_POST['psw'])
    && isset($_POST['repeat_psw'])){

    $user = new User();

        session_start();

    if($_POST['psw'] == $_POST['repeat_psw']){

        if($user->checkRulePassword($_POST['psw'])){

            $userCreate = $user->create($_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['birthday'], $_POST['psw']);
            
            if($userCreate){
                
                $_SESSION['msg'] = 'user created successfully';
                header('Location: userLogin.php');
            }else{
                $_SESSION['msg']= 'error registering.';
                header('Location: userLogin.php');//poderia usar um elseif
            }
        
        }else{
            $_SESSION['msg'] = 'Your password is weak.';
            header('Location: registerUser.php');
        }         
            
    }

}

?>
