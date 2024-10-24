<?php
 

 class Login_svc {
     
    private $pdo;

    function __construct() {
        $this->pdo = database::conectar();       
    }

    public function validateLogin($username, $password){
        $hash = hash('sha256', $password);  
        $stmt = $this->pdo->prepare("
        SELECT *
        FROM usuario
        WHERE user = :username
        AND password = :password;
        ");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        // $stmt->bindParam(':password', $hash, PDO::PARAM_STR);
        
        // Ejecutar la consulta
        $stmt->execute();
        $user = $stmt->fetch();
        

        return $user;
    }

}

?>
