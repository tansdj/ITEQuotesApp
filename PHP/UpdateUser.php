<?php 
require './Validation.php';
require './FormHandler.php';
require '../Classes/UserClass.php';
include '/../HTML/AdminHeader.html';
$user = new User(NULL,"","","");
if(isset($_GET['userId'])){
    $user->setId($_GET['userId']);
    $user = $user->getSpecUserFromDB();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update User</title>
        <link rel="stylesheet" type="text/css" href="../CSS/main.css">
    </head>
    <body>
        <section class="form">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <h1 class="bodyHeadings">User Details:</h1>
            <input type="text" name="txtId" hidden="" value="<?php echo $user->getId();?>" />
            <label class="leftFloat"><label>E - Mail:</label></label><input type="text" name="txtEmail" value="<?php echo $user->getEmail();?>" disabled="" /><br><br>
            <label class="leftFloat"><label class="error"><?php showComboError('cmbTypes', 'btnRegister')?></label><label>Type:</label></label><select name="cmbTypes"><?php $types = Array('<-->','Reader','Editor','Admin');stickyCombo('cmbTypes', 'btnRegister', $types);?></select><br><br>
            <input id="registerButton" class="regButton" type="submit" value="Update" name="btnRegister" />
            <a class="links" href="./UserManagement.php">Cancel</a><br><br>
        </form>
        </section>
        <?php 
        if(isset($_POST['btnRegister'])){
            if(validateUpdateUserDetails()==false){
                include '../HTML/Error.html';
            }
            else{
                $newUser = new User($_POST['txtId'],"", "", $_POST['cmbTypes']);
                $newUser->updateUser();
                header('Location: ./UserManagement.php');
            }
            }
        ?>
    </body>
</html>

