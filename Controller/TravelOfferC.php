<?php
require_once '../config.php';
require_once '../Model/TravelOffer.php';

class TravelOfferC {
    public function listOffers() {
        $sql = "SELECT * FROM TravelOffer";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function deleteOffer($id) {
        $sql = "DELETE FROM TravelOffer WHERE idTravelOffer = :id";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->execute(['id' => $id]);
    }
    public function addOffer($offer) {
        $sql = "INSERT INTO TravelOffer (title, destination, departureDate, returnDate, price, category)
                VALUES (:title, :destination, :departureDate, :returnDate, :price, :category)";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->execute([
            'title' => $offer->getTitle(),
            'destination' => $offer->getDestination(),
            'departureDate' => $offer->getDepartureDate(),
            'returnDate' => $offer->getReturnDate(),
            'price' => $offer->getPrice(),
            'category' => $offer->getCategory()
        ]);
    }
    public function getOfferById($id) {
        $sql = "SELECT * FROM TravelOffer WHERE idTravelOffer = :id";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }
    public function updateOffer($id, $offer) {
        $sql = "UPDATE TravelOffer SET 
                title = :title, 
                destination = :destination, 
                departureDate = :departureDate, 
                returnDate = :returnDate, 
                price = :price, 
                category = :category 
                WHERE idTravelOffer = :id";
        
        $db = config::getConnexion();
        $query = $db->prepare($sql);
    
        $query->execute([
            'title' => $offer->getTitle(),
            'destination' => $offer->getDestination(),
            'departureDate' => $offer->getDepartureDate(),
            'returnDate' => $offer->getReturnDate(),
            'price' => $offer->getPrice(),
            'category' => $offer->getCategory(),
            'id' => $id
        ]);
    }
}

?>