<?php

if($_SERVER["REQUEST_METHOD"]==="POST")

{
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];
   
    try {
        require_once 'db.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        $errors =[];

        //ERROR HANDLERS
        if(is_input_empty($username,$pwd)){
            $errors["empty_input"]="Fill in all fields!";
        }

        $result=get_user($pdo,$username);

         if(is_username_wrong($result)){
            $errors["login_incorrect"]="Incorrect Username";
        }

        if(!is_username_wrong($result) && is_password_wrong($pwd,$result["password"])){
            $errors["password_incorrect"]="Incorrect password";
        }

        require_once 'config_session.inc.php';

        if ($errors){
            $_SESSION["errors_login"]=$errors;

            Header("Location: ../login.php");
            die();
        }

       
        $_SESSION["UserName"]=$result["UserName"];                  //this stores the username in session which is used in config session for appending the username when regenerating the id
        $_SESSION['last_regeneration']=time();                     //this resets the timer for regenerating the session id
   
        Header("Location: ../login.php?login=success");

        $pdo=null;
        $stmt=null;

        die();
    } catch (PDOException $e) {
        die("Query failed:".$e->getMessage());
    }


} else{
    Header("Location: ../login.php");
    die();
}