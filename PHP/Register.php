<?php 
require './Validation.php';
require './FormHandler.php';
require '../Classes/UserClass.php';
require_once './SessionHandler.php';
session_start();
if (isset($_SESSION['QuotesType'])){
    if($_SESSION['QuotesType']=="Admin"){
        include './HTML/AdminHeader.html';
        }
    elseif (($_SESSION['QuotesType']=="Editor")) {
        include './HTML/EditorHeader.html';
        }
    elseif (($_SESSION['QuotesType']=="Reader")) {
        include './HTML/ReaderHeader.html';
        }
        }
    else{
        include '../HTML/ReaderHeader.html';
        }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="../CSS/main.css">
    </head>
    <body>
        <section class="form">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <h1 class="bodyHeadings">Please enter your details:</h1>
            <label class="leftFloat"><label class="error"><?php showEmailError('txtEmail', 'btnRegister')?></label><label>E - Mail:</label></label><input type="text" name="txtEmail" value="<?php stickyTextBox('txtEmail', 'btnRegister')?>" /><br><br>
            <label class="leftFloat"><label class="error"><?php showPasswordError('txtPassword', 'txtRePassword', 'btnRegister')?></label><label>Password:</label></label><input type="password" name="txtPassword" value="<?php stickyTextBox('txtPassword', 'btnRegister')?>" /><br><br>
            <label class="leftFloat"><label class="error"><?php showPasswordError('txtPassword', 'txtRePassword', 'btnRegister')?></label><label>Re - enter Password:</label></label><input type="password" name="txtRePassword" value="<?php stickyTextBox('txtRePassword', 'btnRegister')?>" /><br><br>         
            <input id="registerButton" class="regButton" type="submit" value="Register" name="btnRegister" />
            <a class="links" href="./Login.php">Login</a><br><br>
        </form>
        </section>
        <?php 
        if(isset($_POST['btnRegister'])){
            if(validateRegistration()==false){
                include '../HTML/Error.html';
            }
            else{
                $password = crypt($_POST['txtPassword'],"Salt");
                $user = new User(NULL,$_POST['txtEmail'],$password,"Reader");
                if($user->testUsernameForDuplicate()==false){
                    $user->insertNewUser();
                    header('Location: ./Login.php');
                }else {include '../HTML/Error.html';
                      echo 'Username already exists';}
            }
            }
        ?>
    </body>
</html>

