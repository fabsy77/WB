<?php

    session_start(); // A sessao precisa estar atica para ser destruida7
    
    if ( session_status() !== PHP_SESSION_ACTIVE ) {

        $sessionDestroy = session_destroy();

        if($sessionDestroy){// se a sessao for destruida va para o login.php

            header('Location: login.php');
        }
    }

?>