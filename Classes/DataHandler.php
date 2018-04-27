<?php

class DataHandler {
    protected $dbName;
    protected $dbHost;
    protected $dbUserName;
    protected $dbPassWord;
    protected $db;
    
    function __construct($dbName, $dbHost = '127.0.0.1', $dbUserName = 'root', $dbPassWord = '') {
        $this->dbName = $dbName;
        $this->dbHost = $dbHost;
        $this->dbUserName = $dbUserName;
        $this->dbPassWord = $dbPassWord;
    }
    function getDb() {
        return $this->db;
    }

    function connectToDB()
    {
        if($this->db = new mysqli($this->dbHost,$this->dbUserName,$this->dbPassWord,$this->dbName)){
            $state = 'db connected';
        }
        else{
            die("Failed to connect to the database");
        }
    }
    
    function runResultQuery($qeury)
    {
        $database = $this->db;
        if($result = $database->query($qeury))
        {
            return $result;
        }
        else{
            echo "<br/>".$qeury."<br/>";
            echo mysqli_error($database);
            die("Unable to perform query");
        }
    }
    
    function runBooleanQuery($query)
    {
        $database = $this->db;
        if($result = $database->query($query))
        {
            return $result;
        }
        else{
            echo "<br/>".$query."<br/>";
            echo mysqli_error($database);
            die("Unable to perform query");
        }
    }
    
    

}

