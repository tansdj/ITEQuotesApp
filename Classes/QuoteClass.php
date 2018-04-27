<?php
require_once 'DataHandler.php';
class Quote{
    protected $id;
    protected $quote_text;
    protected $attributedTo;
    protected $source;
    protected $year;
    
    function __construct($id,$quote_text,$attributedTo,$source,$year) {
        $this->id=$id;
        $this->quote_text = $quote_text;
        $this->attributedTo = $attributedTo;
        $this->source = $source;
        $this->year = $year;
    }
    function getId() {
        return $this->id;
    }

    function getQuote_text() {
        return $this->quote_text;
    }

    function getAttributedTo() {
        return $this->attributedTo;
    }

    function getSource() {
        return $this->source;
    }

    function getYear() {
        return $this->year;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setQuote_text($quote_text) {
        $this->quote_text = $quote_text;
    }

    function setAttributedTo($attributedTo) {
        $this->attributedTo = $attributedTo;
    }

    function setSource($source) {
        $this->source = $source;
    }

    function setYear($year) {
        $this->year = $year;
    }

    function insertQuoteIntoDb(){
        $dh = new DataHandler('quotesdb');
        $dh->connectToDB();
        if(($dh->runBooleanQuery("INSERT INTO `tblquotes`(`quoteId`, `quoteText`, `attributedTo`, `source`, `year`) VALUES (NULL,'$this->quote_text','$this->attributedTo','$this->source','$this->year')"))===false){
            echo "<script lang='JavaScript'>alert('Something went wrong. Please try again later.');<script>";
        }
    }
    
    function deleteQuoteFromDb(){
        $dh = new DataHandler('quotesdb');
        $dh->connectToDB();
        if(($dh->runBooleanQuery("DELETE FROM `tblquotes` WHERE `quoteId`= $this->id"))===false){
            echo "<script lang='JavaScript'>alert('Something went wrong. Please try again later.');<script>";
        }
    }
    
    function updateQuoteInDb(){
        $dh = new DataHandler('quotesdb');
        $dh->connectToDB();
        if(($dh->runBooleanQuery("UPDATE `tblquotes` SET `quoteText`='$this->quote_text',`attributedTo`='$this->attributedTo',`source`='$this->source',`year`='$this->year' WHERE `quoteId`=$this->id"))===false){
            echo "<script lang='JavaScript'>alert('Something went wrong. Please try again later.');<script>";
        }
    }
    
    function getAllQuotes(){
        $quotes = array();
        $dh = new DataHandler('quotesdb');
        $dh->connectToDB();
        $query_results = $dh->runResultQuery("SELECT * FROM `tblquotes`");
        
        $rows = $query_results->fetch_all(MYSQLI_ASSOC);
        
        
        foreach ($rows as $value) {
            $quote = new Quote($value['quoteId'], $value['quoteText'], $value['attributedTo'], $value['source'], $value['year']);
            array_push($quotes, $quote);
        }
        
        return $quotes;              
    }
    
    function getSpecQuoteFromDb(){
        $dh = new DataHandler('quotesdb');
        $dh->connectToDB();
        $query_results = $dh->runResultQuery("SELECT * FROM `tblquotes` WHERE `quoteId` = $this->id");
        
         $rows = $query_results->fetch_all(MYSQLI_ASSOC);        
         foreach ($rows as $value){
             $quote = new Quote(0, '', '', '',NULL);
             $quote->setQuote_text($value['quoteText']);
             $quote->setAttributedTo($value['attributedTo']);
             $quote->setSource($value['source']);
             $quote->setYear($value['year']);
             $quote->setId($value['quoteId']);
         }
         
         return $quote;
    }

    
}

