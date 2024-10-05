<?php
//model interacts with the databse
declare(strict_types=1); // helps at avoiding bugs force ints to need int string to need string etc... and not be the kind of diy all data types mode

function get_username(object $pdo,string $username){
$query="SELECT username FROM users where username=:username;";
$stmt=$pdo->prepare($query); // this prevents sql injections
$stmt->bindParam(":username",$username);
$stmt->execute();

$result=$stmt->fetch(PDO::FETCH_ASSOC);
return $result;

}

function get_email(object $pdo,string $email){
    $query="SELECT email FROM users where email=:email;";
    $stmt=$pdo->prepare($query); // this prevents sql injections
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
    
    }
    function get_phonenumber(object $pdo,string $phonenumber){

        $query="SELECT userPhone FROM users where userPhone=:phonenumber;";
        $stmt=$pdo->prepare($query); // this prevents sql injections
        $stmt->bindParam(":phonenumber",$phonenumber);
        $stmt->execute();
        
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

function set_user(object $pdo,string $username,string $pwd,string $phonenumber,string $email,string $imagepath){
    $query="INSERT INTO users(username,password,userPhone,email,registrationDate,pictureUrl)
    VALUES(:username,:password,:userPhone,:email,:registrationDate,:pictureUrl)";
    $stmt=$pdo->prepare($query); // this prevents sql injections

    $options= [
        'cost'=>12
    ];

    $hashedpassword=password_hash($pwd,PASSWORD_BCRYPT,$options);


    $stmt->bindParam(":username",$username);
    $stmt->bindParam(":password",$hashedpassword);
    $stmt->bindParam(":userPhone",$phonenumber);
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":registrationDate",date('Y-m-d H:i:s'));
    $stmt->bindParam(":pictureUrl",$imagepath);
    $stmt->execute();
}