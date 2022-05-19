<?php
include('../functions/registerr.php');
    session_start();
$data=new Database;
$message = '';
    if(isset($_POST['reje']))
    {
    $fields = array
        (
    'username' =>$_POST['login'],
    'password' =>$_POST['password'],
    'rpassword' =>$_POST['rpassword'],
    'email' =>$_POST['email'],
        );
            if($data->wymagane($fields))
            {
                if($data->sprawdz($fields))
                {
                    $_SESSION['reje']= $_POST['reje'];
                    header("location: http://localhost/jdj/Kamil/konta.php");
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
     <input type="text"  name="login"  placeholder="Login"><br>
       <h2>Password</h2>
    <input type="text" name="password"  placeholder="Password"><br>
    <h2>Repeat Password</h2>
    <input type="text" name="rpassword"  placeholder="Password"><br>
<h2>Email</h2>
 <input type="text" name="email"  placeholder="Email"><br><br><br>

    <input type="submit" name="reje" value="Rejestruj">
    
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
        flex-direction:column;
    }
    input[type=submit]{
        height: 40px;
        width: 130px;
        font-size: 20px;
        background-color: cadetblue;
        color:aliceblue;
    }
</style>