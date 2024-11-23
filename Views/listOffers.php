<?php
require_once '../Controller/TravelOfferC.php';

$offerController = new TravelOfferC();
$offers = $offerController->listOffers();
?>
    <style>
        /* Style général de la page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Couleur de fond bleu très clair */
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Style du tableau */
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        /* Style des en-têtes de colonne */
        th {
            background-color: #007BFF; /* Bleu pour les en-têtes */
            color: #ffffff;
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }

        /* Style des lignes du tableau */
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        /* Effet de survol sur les lignes */
        tr:hover {
            background-color: #f1f9ff;
        }

        /* Style des liens d'action */
        a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
<table>
    <tr>
        <th>Title</th>
        <th>Destination</th>
        <th>Departure Date</th>
        <th>Return Date</th>
        <th>Price</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($offers as $offer) : ?>
        <tr>
            <td><?= htmlspecialchars($offer['title']) ?></td>
            <td><?= htmlspecialchars($offer['destination']) ?></td>
            <td><?= htmlspecialchars($offer['departureDate']) ?></td>
            <td><?= htmlspecialchars($offer['returnDate']) ?></td>
            <td><?= htmlspecialchars($offer['price']) ?></td>
            <td><?= htmlspecialchars($offer['category']) ?></td>
            <td>
                <a href="updateOffer.php?id=<?= $offer['idTravelOffer'] ?>">Update</a> |
                <a href="deleteOffer.php?id=<?= $offer['idTravelOffer'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>