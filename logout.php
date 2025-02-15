<?php 

    require './config/function.php';

    logoutSession();
    redirect( BASE_URL . '/user/login', 'Logout Success!', 'success');
?>



