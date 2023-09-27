<?php
include_once("Sql.php");
class Address{

    private $address;
    private $sql;


    public function __construct() {
        $this->sql = new Sql();
    }


    public function getByUserId($uuserid){

        $params = [
            ':uuserid' => $uuserid
        ];

 
        $query = $this->sql->query('SELECT * FROM address WHERE user_id = :uuserid  ORDER BY id desc',  $params);

        return $query;

    }




    public function getAllAdress(){

 
        $query = $this->sql->query('SELECT * FROM address');

        return $query;

    }
    public function create($uuserid, $ustreet, $ustreetnumber, $uzipcode, $ucity, $utype) {

        $params = [
            ':uuserid' => $uuserid,
            ':ustreet'=> $ustreet,
            ':ustreetnumber' => $ustreetnumber,
            ':uzipcode'=> $uzipcode,
            ':ucity' => $ucity,
            ':utype' => $utype
        ];

        return $this->sql->query("
        INSERT INTO address (user_id, street, street_number, zip_code, city, type) 
        VALUES (:uuserid, :ustreet, :ustreetnumber, :uzipcode, :ucity, :utype)", $params, true);

    }

}

?>

