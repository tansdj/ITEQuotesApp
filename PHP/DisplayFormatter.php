<?php
require_once (realpath( dirname( __FILE__ ) ).'/../Classes/UserClass.php');
require_once (realpath( dirname( __FILE__ ) ).'/../Classes/QuoteClass.php');
function displayReaderStyleQuote($quote){
    $q = new Quote(NULL, "", "", "", NULL);
    $q = $quote;
    $quoteId = $q->getId();
    $quoteText= $q->getQuote_text();
    $quoteAttr = $q->getAttributedTo();
    $quoteYear = $q->getYear();
    $quoteSource = $q->getSource();
    $quoteText = str_replace("^", "*", $quoteText);
    $quoteText = str_replace("<", '*', $quoteText);
    $quoteText = str_replace(">", "*", $quoteText);
    $quoteAttr = str_replace("^", "*", $quoteAttr);
    $quoteAttr = str_replace("<", '*', $quoteAttr);
    $quoteAttr = str_replace(">", "*", $quoteAttr);
    $quoteSource = str_replace("^", "*", $quoteSource);
    $quoteSource = str_replace("<", '*', $quoteSource);
    $quoteSource = str_replace(">", "*", $quoteSource);
    echo "<section class='form'><p class='quoteText'>'$quoteText'</p>";
    echo "<p class='source'>$quoteSource($quoteYear)</p>";
    echo "<p class='attributedTo'>Attributed to: $quoteAttr</p></section><br>";
}

function displayAdminEditorStyleQuote($quote){
    $q = new Quote(NULL, "", "", "", NULL);
    $q = $quote;
    $quoteId = $q->getId();
    $quoteText= $q->getQuote_text();
    $quoteAttr = $q->getAttributedTo();
    $quoteYear = $q->getYear();
    $quoteSource = $q->getSource();
    $quoteText = str_replace("^", "*", $quoteText);
    $quoteText = str_replace("<", '*', $quoteText);
    $quoteText = str_replace(">", "*", $quoteText);
    $quoteAttr = str_replace("^", "*", $quoteAttr);
    $quoteAttr = str_replace("<", '*', $quoteAttr);
    $quoteAttr = str_replace(">", "*", $quoteAttr);
    $quoteSource = str_replace("^", "*", $quoteSource);
    $quoteSource = str_replace("<", '*', $quoteSource);
    $quoteSource = str_replace(">", "*", $quoteSource);
    echo "<section class='form'><p class='quoteText'>'$quoteText'</p>";
    echo "<p class='source'>$quoteSource($quoteYear)</p>";
    echo "<p class='attributedTo'>Attributed to: $quoteAttr</p>";
    echo "<a class='links' href='./PHP/UpdateQuote.php?quoteId=$quoteId'>Edit</a><a class='links' href='./PHP/QuoteRemove.php?quoteId=$quoteId'>Delete</a></section><br>";
}

function displayUserDetails($user){
    $u = new User(NULL,"","","");
    $u = $user;
    $id = $u->getId();
    $email = $u->getEmail();
    $type = $u->getType();
    echo "<section class='form'><p class='userDet'>User Email: $email</p>";
    echo "<p class='userDet'>User Type: $type</p>";
    echo "<a class='links' href='./UpdateUser.php?userId=$id'>Edit</a><a class='links' href='./UserRemove.php?userId=$id'>Delete</a></section><br>";
}
function displayUserDetailsWithoutOptions($user){
    $u = new User(NULL,"","","");
    $u = $user;
    $id = $u->getId();
    $email = $u->getEmail();
    $type = $u->getType();
    echo "<section class='form'><p class='userDet'>User Email: $email</p>";
    echo "<p class='userDet'>User Type: $type</p></section><br>";
}

