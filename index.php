<?php

if($_COOKIE['login']==true){
	header('Location: /admin/index.php');
}else{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include_once 'componentes/head.php';?>
    <body>
        <input type="text" name="username" id="username">
        <input type="password" name="password" id="password">
        <input type="button" id="login" value="Login">
    </body>
    </html>
    <?php
}