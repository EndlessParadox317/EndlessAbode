<?php
//controller deals with data
declare(strict_types=1); // helps at avoiding bugs force ints to need int string to need string etc... and not be the kind of diy all data types mode

function is_input_empty(string $username,string $pwd){

    if(empty($username)||empty($pwd)){
            return true;
    }else{ return false;
    }

}



function is_username_wrong(array|bool $result) //if $result has a user it will be an array type if $result has no user then it will be a bool false so we need to allow for it to be either bool or array
{ 
   if(is_array($result)){
    return false;
   }else{
    return true;
   }
}   

function is_password_wrong(string $pwd,string $hashedpassword) 
{
   if(!password_verify($pwd,$hashedpassword))
   {
    return true;
   }else{
    return false;
   }
}   