<?php 

 include './config/function.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

 <h1><?= htmlspecialchars($_SESSION['otpInUser']['otp']); ?></h1>

    
</body>
</html>