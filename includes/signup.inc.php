<?php
if($_SERVER["REQUEST_METHOD"]==="POST")// this checks if the user came to this page legitly by signing up and not through some other means
{
    //htmlspecialchars should apparently only be used when outputting something on the website
     $username=$_POST["username"];
     $pwd=$_POST["pwd"];
     $phonenumber=$_POST["phonenumber"];
     $email=$_POST["email"];
     if($_FILES["image"]["error"]===4){
        $imagepath= "images/default.jpg";
     }
 
     try {
        require_once 'db.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //ERROR HANDLERS
        $errors=[];
        if(is_input_empty($username,$pwd,$phonenumber,$email)){
            $errors["empty_input"]="Fill in all fields!";

        }

        if(is_email_invalid($email)){
            $errors["invalid_email"]="Invalid email used!";
        }
        if(is_username_taken($pdo,$username)){
            $errors["username_taken"]="Username already exists!";
        }
        if(is_email_registered($pdo,$email)){
            $errors["email_used"]="Email already exists!";
        }

        if(is_phonenumber_used($pdo,$phonenumber)){
            $errors["phonenumber_used"]="Phone number already used!";
        }

        require_once 'config_session.inc.php';
        if ($errors){
            $_SESSION["errors_signup"]=$errors;
            $signupData=[
                "username"=>$username,
                "phonenumber"=>$phonenumber,
                "email"=>$email
            ];
            $_SESSION["signup_data"]=$signupData;


            Header("Location: ../signup.php");
            die();

        }

        if (!isset($imagepath)){
        $imagepath=move_image($_FILES["image"],$username);
        }
        create_user($pdo,$username,$pwd,$phonenumber,$email,$imagepath);
        unset($_SESSION["signup_data"]);
        Header("Location: ../signup.php?signup=success");

        $pdo=null;
        $stmt=null;

        die();

     } catch (PDOException $e) {
       die("Query failed:".$e->getMessage());
     }


}else{

    Header("Location: ../index.php");
    die();
}