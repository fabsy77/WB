<?php

class Sql { 

    private $pdo;
    const PARAM_host='localhost';
    const PARAM_port='3306';
    const PARAM_db_name='webshop';
    const PARAM_user='root';
    const PARAM_db_pass='';

    public function __construct(){
        $this->pdo = new PDO('mysql:host='.Sql::PARAM_host.';port='.Sql::PARAM_port.';dbname='.Sql::PARAM_db_name,Sql::PARAM_user, Sql::PARAM_db_pass);
    }

    public function query($query, $params = [], $insert = false){
        $queryPrepare = $this->pdo->prepare($query);
      
        
    if (!empty($params)) {

        foreach ($params as $column => $value) {
            $queryPrepare->bindValue($column, $value);
        }
    }
    
    $exec = $queryPrepare->execute();
    
    if($insert){
        return $exec;

    }
    return $queryPrepare->fetchAll(PDO::FETCH_ASSOC);
    }




}


?>