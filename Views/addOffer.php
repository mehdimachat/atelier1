<?php
// Inclusion du contrôleur pour gérer l'ajout
require_once '../Controller/TravelOfferC.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Travel Offer</title>
</head>

<body>

<h2>Add New Travel Offer</h2>
<form action="../actions/addOfferProcess.php" method="POST">
    <!-- Champ pour le titre -->
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" placeholder="Title" required minlength="3">
    
    <!-- Champ pour la destination -->
    <label for="destination">Destination:</label>
    <input type="text" name="destination" id="destination" placeholder="Destination" required pattern="[a-zA-Z\s]{3,}">
    
    <!-- Champ pour la date de départ -->
    <label for="departureDate">Departure Date:</label>
    <input type="date" name="departureDate" id="departureDate" required>
    
    <!-- Champ pour la date de retour -->
    <label for="returnDate">Return Date:</label>
    <input type="date" name="returnDate" id="returnDate" required>
    
    <!-- Champ pour le prix -->
    <label for="price">Price:</label>
    <input type="number" name="price" id="price" placeholder="Price" step="0.01" min="0" required>
    
    <!-- Champ pour la catégorie -->
    <label for="category">Category:</label>
    <select name="category" id="category" required>
        <option value="" disabled selected>Select Category</option>
        <option value="Adventure">Adventure</option>
        <option value="Relaxation">Relaxation</option>
        <option value="Cultural">Cultural</option>
        <option value="Family">Family</option>
        <option value="Romantic">Romantic</option>
    </select>
    
    <!-- Bouton de soumission -->
    <button type="submit">Add Offer</button>
</form>

</body>
</html>