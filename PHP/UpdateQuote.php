<?php
require './Validation.php';
require './FormHandler.php';
require '../Classes/QuoteClass.php';
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
if(isset($_GET['quoteId'])){
    $quote->setId($_GET['quoteId']);
    $quote = $quote->getSpecQuoteFromDb();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Quote</title>
        <link rel="stylesheet" type="text/css" href="../CSS/main.css">
    </head>
    <body>
        <section class="form">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <h1 class="bodyHeadings">Please enter quote details:</h1>
            <input type="text" name="txtId" hidden="" value="<?php echo $quote->getId();?>" />
            <label class="leftFloat"><label class="error"><?php showTextError('txtQuote', 'btnAddQuote');?></label><label>Quote:</label></label><textarea rows="10" cols="50" name="txtQuote"><?php echo $quote->getQuote_text();?></textarea><br><br>
            <label class="leftFloat"><label class="error"><?php showTextError('txtSource', 'btnAddQuote');?></label><label>Source:</label></label><input type="text" name="txtSource" value="<?php echo $quote->getSource()?>" /><br><br>
            <label class="leftFloat"><label class="error"><?php showTextError('txtAttr', 'btnAddQuote');?></label><label>Attributed To:</label></label><input type="text" name="txtAttr" value="<?php $quote->getAttributedTo()?>" /><br><br> 
            <label class="leftFloat"><label class="error"><?php showTextError('txtYear', 'btnAddQuote');?></label><label>Year:</label></label><input type="number" name="txtYear" value="<?php $quote->getYear()?>" /><br><br>         
            <input id="registerButton" class="regButton" type="submit" value="Add Quote" name="btnAddQuote" />
            <a class="links" href="../index.php">Cancel</a><br><br>
        </form>
        </section>
        <?php 
        if(isset($_POST['btnAddQuote'])){
            if(validateNewQuote()==false){
                include '../HTML/Error.html';
            }
            else{
                $newQuote = new Quote($_POST['txtId'], $_POST['txtQuote'], $_POST['txtAttr'], $_POST['txtSource'],$_POST['txtYear']);
                $newQuote->updateQuoteInDb();
                header('Location: ../index.php');
            }
            }
        ?>
    </body>
</html>


