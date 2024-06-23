<?php
// Vérifier si l'ID est passé en paramètre GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Chemin vers le fichier JSON
    $jsonFile = '../data/portfolio.json';

    // Charger le contenu actuel du fichier JSON
    $json_data = file_get_contents($jsonFile);

    // Décoder JSON en tableau PHP associatif
    $portfolioItems = json_decode($json_data, true);

    // Vérifier si le décodage a réussi
    if ($portfolioItems === null) {
        echo "Erreur lors du chargement des données JSON.";
        exit;
    }

    // Rechercher l'index de l'élément à supprimer
    $indexToRemove = -1;
    foreach ($portfolioItems as $index => $item) {
        if ($item['id'] == $id) {
            $indexToRemove = $index;
            break;
        }
    }

    // Si l'élément est trouvé, le supprimer du tableau
    if ($indexToRemove != -1) {
        array_splice($portfolioItems, $indexToRemove, 1);

        // Sauvegarder les données mises à jour dans le fichier JSON
        $jsonData = json_encode($portfolioItems, JSON_PRETTY_PRINT);
        if (file_put_contents($jsonFile, $jsonData)) {
            echo "L'élément avec l'ID $id a été supprimé avec succès.";
            // Redirection après la suppression
            header('Location: ../../addportfolio.php');
        } else {
            echo "Erreur lors de la suppression de l'élément.";
        }
    } else {
        echo "L'élément avec l'ID $id n'a pas été trouvé.";
    }
} else {
    echo "ID d'élément non spécifié.";
}
?>