<?php
// these are all security measures made to enhance security
ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode',1);


session_set_cookie_params([
    'lifetime'=>1800, //this makes cookie expire after x seconds
    'domain'=>'localhost',
    'path'=>'/',
    'secure'=>true,
    'httponly'=>true,
]);

session_start();
// this regenerates the session id after a set interval so it prevents from having the same one over a long period of time and having it stolen

if(isset($_SESSION["UserName"])){
    if (!isset($_SESSION['last_regeneration']) ){
        regenerate_session_id_loggedin();
    }else{
    
    $interval= 60 * 0.5; //represents time in seconds for 30 minutes // 60 secs * 30 mins
    if(time()-$_SESSION['last_regeneration']>=$interval){
        regenerate_session_id_loggedin();
    
    }
    }

}else{

    if (!isset($_SESSION['last_regeneration']) ){
        regenerate_session_id();
    }else{
    
    $interval= 60 * 0.5; //represents time in seconds for 30 minutes // 60 secs * 30 mins
    if(time()-$_SESSION['last_regeneration']>=$interval){
    regenerate_session_id();
    
    }
    }

}



function regenerate_session_id(){
    session_regenerate_id(true);
    $_SESSION['last_regeneration']=time();
}

function regenerate_session_id_loggedin(){
    session_regenerate_id(true);
    $username=$_SESSION["UserName"];


    $_SESSION['last_regeneration']=time();
}
