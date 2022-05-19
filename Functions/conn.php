<?php

class Database
{
    
    public $con;
    public $error;
    
    
    public function __construct()
    {
        try{
            $this->con= new PDO("mysql:host=localhost;dbname=konta","root","");
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $error){
            echo 'Coś poszło nie tak'.$error->getMessage();
        }
    }
    public function wymagane($fields)
    {
        $cout=0;
        foreach($fields as $k => $v)
        {
            if(empty($v))
            {
                $cout++;
                $this->error .= "<p>".$k."jest wymagany</p>";
            }
        }
        if($cout==0)
        {
            return true;
        }
        
    }
    public function sprawdz($fields)
    {
        
        $login = $fields['login'];
        $password = $fields['password'];
        $password = md5($password);
        $stmt = $this->con->prepare("SELECT * FROM konta WHERE login = :login AND password = :password");
        $stmt->bindParam(':login',$login, PDO::PARAM_STR);
        $stmt->bindParam(':password',$password, PDO::PARAM_STR);
            $stmt-> execute();
            if($stmt->rowCount()<=0)
            {
                $this->error="zły login lub hasło";
            }
            else
            {
                $_SESSION["login"] = $field['login'];
                $_SESSION["password"] = $field['password'];
                return true;
            }
        
    }
    public function checkRole($login)
    {
        $stmt = $this->con->prepare("SELECT roles.role FROM roles JOIN konta ON konta.role = roles.id WHERE konta.login = :login");
        $stmt->bindParam(':login',$login,PDO::PARAM_STR);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            switch($row['role']){
                case 'admin':
                    return $_SESSION['login'] = 'admin';
                break;

                case 'editor':
                    return $_SESSION['login'] = 'editor';
                break;

                case 'user':
                    return $_SESSION['login'] = 'user';
                break;
            }

        }
    }
    
    
}













