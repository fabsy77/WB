<?php

  
    if ( session_status() !== PHP_SESSION_ACTIVE )
    {
        session_start();
    }
        
    if( isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
        echo($_SESSION['msg']); 
        unset($_SESSION['msg']);
    }
?>