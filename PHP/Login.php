<?php 
session_start();
require '../Classes/UserClass.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="CSS/main.css">
    </head>
    <body>
        <?php 
        require './Validation.php';
        require './FormHandler.php';
        include '../HTML/ReaderHeader.html';
        ?>
        <section class="form">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <h1 class="bodyHeadings">Please enter your login details:</h1>
            <label class="leftFloat"><label class="error"><?php showTextError('txtEmail','btnLogin')?></label><label>Email:</label></label><input type="text" name="txtEmail" value="<?php stickyTextBox('txtEmail', 'btnLogin')?>" /><br><br>
            <label class="leftFloat"><label class="error"><?php ?></label><label>Password:</label></label><input type="password" name="txtPassword" value="" /><br><br>
            <input id="loginButton" class="regButton" type="submit" value="Login" name="btnLogin" />
            <a class="links" href="./Register.php">Register</a>
            </form>
        </section>
        <?php
        if(isset($_POST['btnLogin'])){
            $Attempt = new User(0,$_POST['txtEmail'],crypt($_POST['txtPassword'],"Salt"),'');
            if($Attempt->validateLogin()==false){
                include '../HTML/Error.html';
            }else{
            header('Location: ../index.php');}
        }
        ?>   
    </body>
</html>


