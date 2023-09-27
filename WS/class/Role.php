<?php

include_once("Sql.php");
class Role{

    private $sql;
    public $id;
    public $name;

    public function __construct()
    {
        $this->sql = new Sql();
    }
    
    public function getByName($name) {

        $params = [
            ':uname' => $name
        ];
        return $this->sql->query("SELECT * FROM role WHERE name LIKE :uname", $params);
    }
}



?>