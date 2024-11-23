<!-- Fichier: Views/updateOffer.php -->
<?php
require_once '../Controller/TravelOfferC.php';

$offerController = new TravelOfferC();

// Vérifier que l'identifiant est fourni dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $offer = $offerController->getOfferById($id);
} else {
    echo "ID non fourni";
    exit;
}

// Si le formulaire est soumis, traiter les modifications
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $destination = $_POST['destination'];
    $departureDate = $_POST['departureDate'];
    $returnDate = $_POST['returnDate'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Créer une instance de TravelOffer avec les nouvelles valeurs
    $updatedOffer = new TravelOffer($title, $destination, $departureDate, $returnDate, $price, $category);

    // Appeler la fonction de mise à jour
    $offerController->updateOffer($id, $updatedOffer);

    // Rediriger vers la liste des offres après modification
    header('Location: listOffers.php');
    exit;
}
?>

<!-- Formulaire de modification d'une offre -->
<form action="" method="POST">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="<?= htmlspecialchars($offer['title']) ?>" required minlength="3">

    <label for="destination">Destination:</label>
    <input type="text" name="destination" id="destination" value="<?= htmlspecialchars($offer['destination']) ?>" required pattern="[a-zA-Z\s]{3,}">

    <label for="departureDate">Departure Date:</label>
    <input type="date" name="departureDate" id="departureDate" value="<?= htmlspecialchars($offer['departureDate']) ?>" required>

    <label for="returnDate">Return Date:</label>
    <input type="date" name="returnDate" id="returnDate" value="<?= htmlspecialchars($offer['returnDate']) ?>" required>

    <label for="price">Price:</label>
    <input type="number" step="0.01" name="price" id="price" value="<?= htmlspecialchars($offer['price']) ?>" required min="0">

    <label for="category">Category:</label>
    <select name="category" id="category" required>
        <option value="Adventure" <?= $offer['category'] === 'Adventure' ? 'selected' : '' ?>>Adventure</option>
        <option value="Relaxation" <?= $offer['category'] === 'Relaxation' ? 'selected' : '' ?>>Relaxation</option>
        <option value="Cultural" <?= $offer['category'] === 'Cultural' ? 'selected' : '' ?>>Cultural</option>
        <option value="Family" <?= $offer['category'] === 'Family' ? 'selected' : '' ?>>Family</option>
        <option value="Romantic" <?= $offer['category'] === 'Romantic' ? 'selected' : '' ?>>Romantic</option>
    </select>

    <button type="submit">Update Offer</button>
</form>