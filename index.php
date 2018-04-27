<?php
require_once (realpath( dirname( __FILE__ ) ).'\Classes\UserClass.php');
require_once (realpath( dirname( __FILE__ ) ).'\Classes\QuoteClass.php');
require_once (realpath( dirname( __FILE__ ) ).'\PHP\DisplayFormatter.php');
require_once (realpath( dirname( __FILE__ ) ).'\PHP\SessionHandler.php');
$user = new User(0,'','','');
if(isset($_COOKIE['QuotesUserId'])){
    $user->setId($_COOKIE['QuotesUserId']);
    $user->getSpecUserFromDB();
    myProfileSetSessions($user);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="CSS/main.css">
    </head>
    <body>
        <?php      
        session_start();
        if (isset($_SESSION['QuotesType'])){
            if($_SESSION['QuotesType']=="Admin"){
            include './HTML/AdminHeader.html';
            $quote = new Quote(NULL, "", "","", NULL);
            $quotes = $quote->getAllQuotes();
            foreach ($quotes as $value) {
                $quote = $value;
                displayAdminEditorStyleQuote($quote);
            }
            }
            elseif (($_SESSION['QuotesType']=="Editor")) {
            include './HTML/EditorHeader.html';
            $quote = new Quote(NULL, "", "","", NULL);
            $quotes = $quote->getAllQuotes();
            foreach ($quotes as $value) {
                $quote = $value;
                displayAdminEditorStyleQuote($quote);
            }
            }
            elseif (($_SESSION['QuotesType']=="Reader")) {
            include './HTML/ReaderHeader.html';
            $quote = new Quote(NULL, "", "","", NULL);
            $quotes = $quote->getAllQuotes();
            foreach ($quotes as $value) {
                $quote = $value;
                displayReaderStyleQuote($quote);
            }
            }
        }
        else {
            include './HTML/ReaderHeader.html';
            header('Location: ./PHP/Register.php');
        }
        ?>
    </body>
</html>

