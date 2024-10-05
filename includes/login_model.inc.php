<?php
//controller deals with data
declare(strict_types=1); // helps at avoiding bugs force ints to need int string to need string etc... and not be the kind of diy all data types mode

function get_user(object $pdo,string $username){
    $query="SELECT * FROM users where UserName=:username;";
    $stmt=$pdo->prepare($query); // this prevents sql injections
    $stmt->bindParam(":username",$username);
    $stmt->execute();
    
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
}   