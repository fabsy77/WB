<?php
    include_once('Role.php');
    include_once('Sql.php');

    class User{

    private $user;
    private $sql;

    public function __construct() {
        $this->sql = new Sql();
    }

    public function getUserByLoginAndPassword($login, $password, $roleName){
        $role = new Role();
        $role = $role->getByName($roleName);

        if(empty($role)){//se o role for vazio retorna um array vazio(como se o usuario nao existisse) e nao da sequencia
            return[];
        }
        $roleId = $role[0]['id'];

        $params = [':uemail' => $login,
                    ':upassword' => $password,
                    ':urole' => $roleId
    
    ];
        $query = $this->sql->query('SELECT * FROM user WHERE email = :uemail AND password = md5(:upassword) AND role = :urole', $params);

        return $query;

    }
    public function create($email, $firstName, $lastName, $birthday, $password){

        $params = [ 
                ':uemail' => $email,
                 ':ufirst_name' => $firstName,
                 ':ulast_name' => $lastName,
                 ':ubirthday'=> $birthday,
                 ':upsw' => md5($password),//Senha criptografada com md5
                 ':urole' => 2
    ];

    $query = $this->sql->query("INSERT INTO user (email, password, first_name, last_name, date_birthday, role ) 
                                VALUES (:uemail, :upsw, :ufirst_name, :ulast_name, :ubirthday, :urole )", $params, true);//retorna verdadeiro ou falso

                                return $query;




    }

    public function checkRulePassword($password){

        $number = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
         
        if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {

            return false;//poderia deixar so a mensagem aqui ?
        } else {
            return true;
        }



    }

    
}

?>