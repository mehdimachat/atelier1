<?php

class TravelOffer {
    private $idTravelOffer;
    private $title;
    private $destination;
    private $departureDate;
    private $returnDate;
    private $price;
    private $category;

    public function __construct($title, $destination, $departureDate, $returnDate, $price, $category) {
        $this->setTitle($title);
        $this->setDestination($destination);
        $this->setDepartureDate($departureDate);
        $this->setReturnDate($returnDate);
        $this->setPrice($price);
        $this->setCategory($category);
    }

    // Validations and setters
    public function setTitle($title) {
        if (strlen($title) >= 3) {
            $this->title = $title;
        } else {
            throw new Exception("Le titre doit avoir au moins 3 caractères.");
        }
    }

    public function setDestination($destination) {
        if (preg_match('/^[a-zA-Z\s]{3,}$/', $destination)) {
            $this->destination = $destination;
        } else {
            throw new Exception("La destination doit contenir au moins 3 lettres sans caractères numériques ou spéciaux.");
        }
    }

    public function setDepartureDate($departureDate) {
        if (!empty($departureDate)) {
            $this->departureDate = $departureDate;
        } else {
            throw new Exception("La date de départ est obligatoire.");
        }
    }

    public function setReturnDate($returnDate) {
        if (!empty($returnDate)) {
            $this->returnDate = $returnDate;
        } else {
            throw new Exception("La date de retour est obligatoire.");
        }
    }

    public function setPrice($price) {
        if (is_numeric($price) && $price > 0) {
            $this->price = $price;
        } else {
            throw new Exception("Le prix doit être un nombre positif.");
        }
    }

    public function setCategory($category) {
        $validCategories = ['Adventure', 'Relaxation', 'Cultural', 'Family', 'Romantic'];
        if (in_array($category, $validCategories)) {
            $this->category = $category;
        } else {
            throw new Exception("Catégorie invalide.");
        }
    }

    // Getters
    public function getIdTravelOffer() {
        return $this->idTravelOffer;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDestination() {
        return $this->destination;
    }

    public function getDepartureDate() {
        return $this->departureDate;
    }

    public function getReturnDate() {
        return $this->returnDate;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getCategory() {
        return $this->category;
    }
}
?>