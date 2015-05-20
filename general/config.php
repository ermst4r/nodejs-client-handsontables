<?php
$updated = (isset($_GET['updated']) ? $_GET['updated'] : -1);
$deleted = (isset($_GET['deleted']) ? $_GET['deleted'] : -0);
$apiUrl = 'http://localhost:3000';
$websiteUrl = 'http://sandbox.ermst4r.nl/contentscraper/';
$currentHomePage = $_SERVER['PHP_SELF'].'?updated=-1&lang='.$_GET['lang']."&scrapeStartDate=".$_GET['scrapeStartDate'];
if(!isset($_GET['lang'])) {
    header("Location:{$currentHomePage}");
}

if(isset($_POST['sbmDate'])) {
    header("Location:" . $webSiteUrl . "index.php?updated=" . $_GET['updated'] . "&lang=" . $_GET['lang'] . "&scrapeStartDate=" . $_POST['date']);

}

?>