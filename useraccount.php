<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/useraccount_contr.inc.php';
$imagepath=get_imagepath();
?>

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<img src="<?php echo htmlspecialchars($imagepath); ?>">
</body>
</html>