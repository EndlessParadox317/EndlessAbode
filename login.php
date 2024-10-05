<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/loginsignup.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
<div class="signup-container">
    <h3 class="signup-title">Login</h3>
    <form action="includes/login.inc.php" method="post" class="signup-form">
        <input type="text" name="username" placeholder="Username" >
        <input type="password" name="pwd" placeholder="Password" >
        <button class="signup-btn" >Login</button>
    </form>
    <?php output_username();
 echo "Session ID: " . session_id();?>

    <?php
         check_login_errors();
    ?>
</div>

<h3> Logout</h3>

<form action="includes/logout.inc.php" method="post">
        <button>Logout</button>
</form>

<a class=login-btn href="useraccount.php" >User Account</a>

<div id=press-arrow-left>
    
<a href="signup.php">
<img src="arrow.png" width="120" height="120" > </img>
</a>
</div>

<script src="js/leftrightkey.js" defer></script>



</body>
</html>