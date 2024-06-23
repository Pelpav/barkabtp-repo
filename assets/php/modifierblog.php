<?php
// Activer l'affichage des erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Chemin vers le fichier JSON
$jsonFile = 'assets/data/blog.json';

// Vérifier si l'ID est passé en paramètre GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Charger le contenu actuel du fichier JSON
    $json_data = file_get_contents($jsonFile);

    // Décoder JSON en tableau PHP associatif
    $blogItems = json_decode($json_data, true);

    // Vérifier si le décodage a réussi
    if ($blogItems === null) {
        echo "Erreur lors du chargement des données JSON.";
        exit;
    }

    // Rechercher l'index de l'élément à modifier
    $indexToModify = -1;
    foreach ($blogItems as $index => $item) {
        if ($item['id'] == $id) {
            $indexToModify = $index;
            break;
        }
    }

    // Vérifier si l'élément à modifier a été trouvé
    if ($indexToModify != -1) {
        // Récupérer les données du formulaire
        $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
        $author = isset($_POST['author']) ? htmlspecialchars($_POST['author']) : '';
        $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';

        // Vérifier et traiter le fichier d'image (optionnel)
        $imagePath = $blogItems[$indexToModify]['image']; // Conserver l'image existante par défaut

        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
            $image = $_FILES['image'];
            $imagePath = 'assets/img/blog/' . $image['name'];

            // Déplacer l'image téléchargée vers le dossier du portfolio
            if (move_uploaded_file($image['tmp_name'], $imagePath)) {
                echo "Image déplacée avec succès à $imagePath <br>";
            } else {
                echo "Erreur lors du déplacement de l'image <br>";
                echo "Chemin cible : $imagePath <br>";
                echo "Erreur PHP : " . $_FILES['image']['error'] . "<br>";
                exit;
            }
        }

        // Mettre à jour les données de l'élément dans le tableau
        $blogItems[$indexToModify]['category'] = $category;
        $blogItems[$indexToModify]['title'] = $title;
        $blogItems[$indexToModify]['description'] = $description;
        $blogItems[$indexToModify]['image'] = $imagePath;

        // Convertir les données en format JSON
        $jsonData = json_encode($blogItems, JSON_PRETTY_PRINT);

        // Écrire les données JSON dans le fichier
        if (file_put_contents($jsonFile, $jsonData)) {
            echo "L'élément avec l'ID $id a été modifié avec succès.";
            // Optionnel : Redirection vers une autre page
            header('Location: addblog.php');
            exit;
        } else {
            echo "Erreur lors de la modification de l'élément.";
        }
    } else {
        echo "L'élément avec l'ID $id n'a pas été trouvé.";
    }
} else {
    echo "ID d'élément non spécifié.";
}
?>