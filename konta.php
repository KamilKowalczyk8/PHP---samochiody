<?php
include('functions/conn.php');
    session_start();
$data=new Database;
$message = '';
    if(isset($_POST['login']))
    {
    $fields = array
        (
    'login' =>$_POST['login'],
    'password' =>$_POST['password'],    
        );
            if($data->wymagane($fields))
            {
                if($data->sprawdz($fields))
                {
                    $_SESSION['login']= $_POST['login'];
                    header("location: http://localhost/jdj/Kamil/index.php");
                }
                else
                {
                    $message = $data->error;
                }
                
            }
            else
            {
                $message=$data->error;
            }
    
    }
        
        
        
        
?>





<center><br><br><br><br><br><br><br><div id="jeden">
    <?php
    if(isset($message))
    {
      echo $message;  
    }
    //echo "Cześć." . $_SESSION['username'];
    ?>
    <form method="POST">
   <h2>Login</h2> 
     <input type="text"  name="login" placeholder="Login"><br>
       <h2>Password</h2>
    <input type="text" name="password" placeholder="Password"><br><br><br>
    <input type="submit" name="loguj" value="Zaloguj się">
    <br><br>    <a href=functions/register.php>Rejestracja</a>
</form>
   </div>
<style>
    body{
        background-color: antiquewhite;
    }
    #jeden{
        height: 510px;
        width: 500px;
       justify-content: center;
        align-items: center;
        display: flex;
       background-color: darkseagreen;
        color:aliceblue;
    }
    input[type=submit]{
        height: 40px;
        width: 130px;
        font-size: 20px;
        background-color: cadetblue;
        color:aliceblue;
    }
</style>