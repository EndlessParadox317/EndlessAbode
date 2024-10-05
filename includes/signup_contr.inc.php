<?php
//controller deals with data
declare(strict_types=1); // helps at avoiding bugs force ints to need int string to need string etc... and not be the kind of diy all data types mode







function move_image($image,string $username){
    $targetDir =  '../images/';
    // Extract the file extension from the uploaded image
    $fileExtension = pathinfo($image["name"], PATHINFO_EXTENSION);
     // Create a new file name using the username and the original file extension
     $newFileName = $username . '.' . $fileExtension;
     // Create the full path for the new file
    $targetFile = $targetDir . $newFileName;
      // Move the uploaded file to the target directory with the new name
    if (move_uploaded_file($image["tmp_name"], $targetFile)) {
        return trim($targetFile,"../"); //substr and trim method valid //substr($targetFile,2); // Return the path of the uploaded file remove the ../ in the front
    } else {
        return false;
    }

}


function is_input_empty(string $username,string $pwd,string $phonenumber,string $email){

        if(empty($username)||empty($pwd)||empty($phonenumber||empty($email))){
                return true;
        }else{ return false;
        }

}

function is_email_invalid(string $email){
    
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
            return true;
    }else
    { return false;
    }

}

function is_username_taken(object $pdo,string $username){
    
    if(get_username($pdo,$username))
    {
    return true;
    }else{
    return false;
    }

}

function is_email_registered(object $pdo,string $email){
    
    if(get_email($pdo,$email))
    {
    return true;
    }else{
    return false;
    }
}
function is_phonenumber_used($pdo,$phonenumber){

    if(get_phonenumber($pdo,$phonenumber))
    {
    return true;
    }else{
    return false;
    }

}

function create_user(object $pdo,string $username,string $pwd,string $phonenumber,string $email,string|bool $imagepath){
  set_user($pdo,$username,$pwd,$phonenumber,$email,$imagepath);
}