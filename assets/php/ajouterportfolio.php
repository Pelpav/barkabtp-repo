<?php
// Activer l'affichage des erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Chemin vers le fichier JSON
$portfolioFile = '../data/portfolio.json';

// Générer un nouvel ID unique
function generateUniqueId()
{
    // Générer un identifiant unique
    return uniqid();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $category = isset($_POST['category']) ? htmlspecialchars($_POST['category']) : '';
    $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
    $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';

    // Vérifier et traiter le fichier d'image
    if (isset($_FILES['image'])) {
        $image = $_FILES['image'];
        $imagePath = '../img/portfolio/' . $image['name'];
        $imagePathJSON = 'assets/img/portfolio/' . $image['name'];

        // Déplacer l'image téléchargée vers le dossier du portfolio
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            echo "Image déplacée avec succès à $imagePath <br>";

            // Charger le contenu actuel du fichier JSON
            $currentData = file_get_contents($portfolioFile);
            $arrayData = json_decode($currentData, true);

            // Vérifier si la lecture du fichier JSON a réussi
            if ($arrayData === null) {
                echo "Erreur de lecture du fichier JSON <br>";
                exit;
            }

            // Générer un nouvel ID unique
            $newId = generateUniqueId();

            // Créer un nouvel élément pour le portfolio avec l'ID généré
            $newItem = array(
                'id' => $newId,
                'category' => $category,
                'title' => $title,
                'description' => $description,
                'image' => $imagePathJSON
            );

            // Ajouter le nouvel élément au tableau des données
            $arrayData[] = $newItem;

            // Convertir les données en format JSON
            $jsonData = json_encode($arrayData, JSON_PRETTY_PRINT);

            // Écrire les données JSON dans le fichier
            if (file_put_contents($portfolioFile, $jsonData)) {
                echo "Données ajoutées avec succès au fichier JSON <br>";

                // Redirection après l'ajout (optionnel)
                header('Location: ../../addportfolio.php');
                exit;
            } else {
                echo "Erreur lors de l'écriture des données JSON <br>";
                exit;
            }
        } else {
            echo "Erreur lors du déplacement de l'image <br>";
            echo "Chemin cible : $imagePath <br>";
            echo "Erreur PHP : " . $_FILES['image']['error'] . "<br>";
            exit;
        }
    } else {
        echo "Erreur lors du déplacement de l'image téléchargée <br>";
        exit;
    }
} else {
    echo "Aucune image téléchargée <br>";
    exit;
}
?>