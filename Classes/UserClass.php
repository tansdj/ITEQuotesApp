<?php
require_once (realpath( dirname( __FILE__ ) ).'/DataHandler.php');
require_once (realpath( dirname( __FILE__ ) ).'/../PHP/SessionHandler.php');
class User{
    protected $id;
    protected $email;
    protected $password;
    protected $type;
    
    function __construct($id,$email,$password,$type) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->type = $type;
    }
    
    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getType() {
        return $this->type;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setType($type) {
        $this->type = $type;
    }

    function insertNewUser(){
        $dh = new DataHandler('quotesdb');
        $dh->connectToDB();
        if(($dh->runBooleanQuery("INSERT INTO `tblusers`(`userId`, `userEmail`, `userPassword`, `userType`) VALUES (NULL,'$this->email','$this->password','$this->type')"))===false){
            echo "<script lang='JavaScript'>alert('Something went wrong. Please try again later.');<script>";
        }
    }
    
    function updateUser(){
        $dh = new DataHandler('quotesdb');
        $dh->connectToDB();
        if(($dh->runBooleanQuery("UPDATE `tblusers` SET `userType`='$this->type' WHERE `userId` = $this->id"))===false){
            echo "<script lang='JavaScript'>alert('Something went wrong. Please try again later.');<script>";
        }
    }
            
    function deleteUser(){
        $dh = new DataHandler('quotesdb');
        $dh->connectToDB();
        if(($dh->runBooleanQuery("DELETE FROM `tblusers` WHERE `userId`=$this->id"))===false){
            echo "<script lang='JavaScript'>alert('Something went wrong. Please try again later.');<script>";
        }
    }
    
    function getAllUsers(){
        $users = array();
        $dh = new DataHandler('quotesdb');
        $dh->connectToDB();
        $query_results = $dh->runResultQuery("SELECT * FROM `tblusers`");
        
        $rows = $query_results->fetch_all(MYSQLI_ASSOC);
               
        foreach ($rows as $value) {
            $user = new User($value['userId'], $value['userEmail'], $value['userPassword'], $value['userType']);
            array_push($users, $user);
        }
        
        return $users;              
    }
    
    function testUsernameForDuplicate(){
        $users = $this->getAllUsers();
        $exists = false;
        $current = new User(0,'','','');
        foreach ($users as $user){
            $current = $user;
            if($this->getEmail()==$current->getPassword()){
                $exists=true;
                return true;
            }
        }
        
        return false;
    }
    
    function validateLogin(){
    $users = $this->getAllUsers();
    $current = new User(0,'','','');
    $Date = new DateTime('+1 year');
    foreach ($users as $user){   
        $current = $user;
        if($this->getEmail()==$current->getEmail()){
            if($this->getPassword()==$current->getPassword()){
                $this->setType($current->getType());
                setcookie('QuotesUserId',$current->getId(),$Date->getTimestamp(),'/');
                myProfileSetSessions($current);
                header("Refresh:0");
                return true;
            }
            }
        }
            return false;
    }
    
    function getSpecUserFromDB(){
        $dh = new DataHandler('quotesdb');
        $dh->connectToDB();
        $query_results = $dh->runResultQuery("Select * From `tblusers` WHERE `userId` = $this->id");
        
         $rows = $query_results->fetch_all(MYSQLI_ASSOC);        
         foreach ($rows as $value){
             $user = new User(0, '', '', '');
             $user->setId($value['userId']);
             $user->setEmail($value['userEmail']);
             $user->setPassword($value['userPassword']);
             $user->setType($value['userType']);
         }
         
         return $user;
    }
}

