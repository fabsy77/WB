<?php

// faz o gerenciamento da sessao (verifica se o usuari oesta logado ou nao por exemplo)

session_start();

// se nao estiver logado ou o lagado for falso encaminha pro login.php 
//ou so pode entrar quem tem o usuario deferente de 1
 if(! isset($_SESSION['login']) || $_SESSION['user_info'][0]['role'] != 1)
    header('Location: Login.php');

    return;
?>
