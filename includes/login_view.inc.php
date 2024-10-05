<?php
//view display data on the website
declare(strict_types=1); // helps at avoiding bugs force ints to need int string to need string etc... and not be the kind of diy all data types mode


function output_username(){
    if(isset($_SESSION["UserName"])){

    echo "You are logged in as :".$_SESSION["UserName"];
    }else{
        echo "You are not logged in";
    }

}


function check_login_errors(){
   
if(isset($_SESSION["errors_login"])){
    $errors=$_SESSION["errors_login"];
    echo"<br>";

    foreach($errors as $error){
        echo "<p>$error </p>";
    }


    unset($_SESSION["errors_login"]);
}
else if(isset($_GET['login'])&& $_GET['login']==="success") {
    echo '<br>';
    echo '<p>Login Success!</p>';


}
 
}