<?php
require_once '../Controller/TravelOfferC.php';

if (isset($_GET['id'])) {
    $offerController = new TravelOfferC();
    $offerController->deleteOffer($_GET['id']);
    header('Location: listOffers.php');
}
?>