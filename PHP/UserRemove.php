<?php
require_once (realpath( dirname( __FILE__ ) ).'\DisplayFormatter.php');
include '/../HTML/AdminHeader.html';
$user = new User(NULL,"","","");
echo "<html>
    <body>
        <h1 class='bodyHeadings'>Are you sure you want to delete this user?</h1>
    </body>
</html>";
if(isset($_GET['userId'])){
    $user->setId($_GET['userId']);
    $user = $user->getSpecUserFromDB();
    displayUserDetailsWithoutOptions($user);
}?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <input type="text" name="txtId" hidden="" value="<?php echo $user->getId();?>" />
    <input id="registerButton" class="regButton" type="submit" value="Delete" name="btnDelete" />
    <a class="links" href="./UserManagement.php">Cancel</a><br><br>
</form>
<?php 
    if(isset($_POST['btnDelete'])){
        $newUser = new User($_POST['txtId'],"","","");
        $newUser->deleteUser();
        header('Location: ../index.php');
    }
            
?>

