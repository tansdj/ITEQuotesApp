<?php
require_once (realpath( dirname( __FILE__ ) ).'\DisplayFormatter.php');
include '/../HTML/AdminHeader.html';
$user = new User(NULL,"","","");
echo "<html>
    <body>
        <h1 class='bodyHeadings'>Active Users:</h1>
    </body>";
$users = $user->getAllUsers();
foreach ($users as $value) {
    $user = $value;
    displayUserDetails($user);
}
echo "<a href='Register.php' class='AltLinks'><input class='regButton' type='submit' value='Add new User'/></a>
</html>";
