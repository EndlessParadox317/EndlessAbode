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




function signup_inputs(){

    if(isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])){
        echo '<input type="text" name="username" placeholder="Username" value="'.$_SESSION["signup_data"]["username"].'" >';
    } else{
       echo '<input type="text" name="username" placeholder="Username" >';
    }

    echo '<input type="password" name="pwd" placeholder="Password" >';

    if(isset($_SESSION["signup_data"]["phonenumber"]) && !isset($_SESSION["errors_signup"]["phonenumber_used"])){
        echo '<input type="number" name="phonenumber" placeholder="Phone Number" pattern="5[0-9]{7}" value = "'.$_SESSION["signup_data"]["phonenumber"].'">';
    } else{
       echo '<input type="number" name="phonenumber" placeholder="Phone Number" pattern="5[0-9]{7}" >'; //pattern doesnt work on number need to use tel datatype but that would require lot of changes in the
    }
    
    if(isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["invalid_email"]) && !isset($_SESSION["errors_signup"]["email_used"])){
        echo '<input type="text" name="email" placeholder="Email" value="'.$_SESSION["signup_data"]["email"].'" >';
    } else{
       echo '<input type="text" name="email" placeholder="Email">';
    }
    echo '<label for="image-upload" class="custom-file-input">Upload Image</label>';
    echo '<input type="file" id="image-upload" name="image" accept=".jpg,.jpeg,.png">';  

}


function check_signup_errors()
{

    if(isset($_SESSION['errors_signup']))
    {
         $errors=$_SESSION['errors_signup'];
         echo "<br>";
         foreach($errors as $error){
            echo "<p> $error </p>";
            
         }
         unset($_SESSION['errors_signup']);

    } else if(isset($_GET["signup"]) &&($_GET["signup"])==="success")
    {
        echo "<br>";
        echo "<p>Sign up Success!</p>";
    }
}

