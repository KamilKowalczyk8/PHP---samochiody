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
        $password = $fields['password'];
        $rpassword = $fields['rpassword'];
        $email = $fields['email'];

            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $this->error.="<p> email jest nie poprawny</p>";
            }
             
           

        foreach($fields as $k => $v)
             {
                 if(empty($v))
                 {
                     $cout++;
                     $this->error.=$k." jest wymagany<br>";

                 }
             }

           

             $stmt = $this->con->prepare("SELECT email FROM konta WHERE email = :email");
             $stmt->bindParam(':email',$email, PDO::PARAM_STR);
             $stmt-> execute();
             if($stmt->rowCount() > 0)
             {
                 $this->error="Podany email jest juz zajety";
             }else
             {
             if($password!=$rpassword)
             {
                $cout++;
                $this->error.="<p>Hasła nie są takie same</p>";
             }
             if($cout == 0)
             {
                 return true;
             }
             }
        
        
    }
    public function sprawdz($fields)
    {
        
        $login = $fields['username'];
        $password = $fields['password'];
        $password = md5($password);
        $email = $fields['email'];
        
        $stmt = $this->con->prepare("INSERT INTO konta (id,login,password,email,code,active,role) VALUES ('',:username,:password,:email,'','',2)");
            $stmt->bindParam(':username',$login, PDO::PARAM_STR);
            $stmt->bindParam(':password',$password, PDO::PARAM_STR);
            $stmt->bindParam(':email',$email, PDO::PARAM_STR);
            $stmt->execute();
            if($stmt->rowCount()<=0)
            {
                $this->error="zły login lub hasło";
            }
            else
            {
                return true;
            }
            
        
        
    }
    
    
    
}
