<?php
require_once (realpath( dirname( __FILE__ ) ).'\DisplayFormatter.php');
require_once './SessionHandler.php';
session_start();
if (isset($_SESSION['QuotesType'])){
    if($_SESSION['QuotesType']=="Admin"){
        include '../HTML/AdminHeader.html';
        }
    elseif (($_SESSION['QuotesType']=="Editor")) {
        include '../HTML/EditorHeader.html';
        }
    elseif (($_SESSION['QuotesType']=="Reader")) {
        include '../HTML/ReaderHeader.html';
        }
        }
    else{
        include '../HTML/ReaderHeader.html';
        }
$quote = new Quote(NULL,"","","",NULL);
echo "<html>
    <body>
        <h1 class='bodyHeadings'>Are you sure you want to delete this quote?</h1>
    </body>
</html>";
if(isset($_GET['quoteId'])){
    $quote->setId($_GET['quoteId']);
    $quote = $quote->getSpecQuoteFromDb();
    displayReaderStyleQuote($quote);
}?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <input type="text" name="txtId" hidden="" value="<?php echo $quote->getId();?>" />
    <input id="registerButton" class="regButton" type="submit" value="Delete" name="btnDelete" />
    <a class="links" href="../index.php">Cancel</a><br><br>
</form>
<?php 
    if(isset($_POST['btnDelete'])){
        $newQuote = new Quote($_POST['txtId'], "", "", "", NULL);
        $newQuote->deleteQuoteFromDb();
    }
            
?>

