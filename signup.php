<?php 
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
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
<?php //output_username();?>
    <h3 class="signup-title">Sign Up</h3>
    <form action="includes/signup.inc.php" method="post" enctype="multipart/form-data" class="signup-form">
    <?php   
 signup_inputs();
    ?>
        <button class="signup-btn">Sign Up</button>
    </form>
    <?php
    check_signup_errors();
    ?>
</div>

<div class="container">
    <img id="anchor" src="anchor3.png" >
    <img id="eye" src="anchoreye.png" width="120" height="120">
</div>

<div id="preview-container">
    <h3 class="signup-title">Preview:</h3>
<img id="preview-image" src="#" > </img> <!--src = # means its a placeholder there is no real url yet it will be added later on throug previewImage.js -->
</div>


<div id=press-arrow-right>

<a href="login.php">
<img src="arrow.png" width="120" height="120" > </img>
</a>

</div>

<script src="js/previewImage.js" defer></script> <!-- Defer means to execute the script only after the HTML page has been fully loaded -->
<script src="js/leftrightkey.js" defer></script>
<script src="js/eyesmoving.js" defer></script>



<!--    <a class=login-btn href="login.php" >Login</a>

<h3> Logout</h3>
<form action="includes/logout.inc.php" method="post">

        <button>Logout</button>
    </form>     -->

</body>
</html>