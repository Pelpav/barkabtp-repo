<?php
session_start();

// Rediriger vers blog.php si l'utilisateur n'est pas authentifié
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: portfolio.php');
    exit;
}
// Activer l'affichage des erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Chemin vers le fichier JSON
$jsonFile = 'assets/data/portfolio.json';

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Charger le contenu actuel du fichier JSON
    $json_data = file_get_contents($jsonFile);

    // Décoder JSON en tableau PHP associatif
    $portfolioItems = json_decode($json_data, true);

    // Vérifier si le décodage a réussi
    if ($portfolioItems === null) {
        echo "Erreur lors du chargement des données JSON.";
        exit;
    }

    // Rechercher l'index de l'élément à modifier
    $indexToModify = -1;
    foreach ($portfolioItems as $index => $item) {
        if ($item['id'] == $id) {
            $indexToModify = $index;
            break;
        }
    }

    // Vérifier si l'élément à modifier a été trouvé
    if ($indexToModify != -1) {
        // Récupérer les données du formulaire
        $category = isset($_POST['category']) ? htmlspecialchars($_POST['category']) : '';
        $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
        $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';

        // Vérifier et traiter le fichier d'image (optionnel)
        $imagePath = $portfolioItems[$indexToModify]['image']; // Conserver l'image existante par défaut

        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
            $image = $_FILES['image'];
            $imagePath = 'assets/img/portfolio/' . $image['name'];

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
        $portfolioItems[$indexToModify]['category'] = $category;
        $portfolioItems[$indexToModify]['title'] = $title;
        $portfolioItems[$indexToModify]['description'] = $description;
        $portfolioItems[$indexToModify]['image'] = $imagePath;

        // Convertir les données en format JSON
        $jsonData = json_encode($portfolioItems, JSON_PRETTY_PRINT);

        // Écrire les données JSON dans le fichier
        if (file_put_contents($jsonFile, $jsonData)) {
            echo "L'élément avec l'ID $id a été modifié avec succès.";
            // Optionnel : Redirection vers une autre page
            header('Location: addportfolio.php');
            exit;
        } else {
            echo "Erreur lors de la modification de l'élément.";
        }
    } else {
        echo "L'élément avec l'ID $id n'a pas été trouvé.";
    }
} else {
    // Si le formulaire n'est pas soumis, afficher le formulaire pré-rempli

    // Vérifier si l'ID est passé en paramètre GET
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        // Charger le contenu actuel du fichier JSON
        $json_data = file_get_contents($jsonFile);

        // Décoder JSON en tableau PHP associatif
        $portfolioItems = json_decode($json_data, true);

        // Vérifier si le décodage a réussi
        if ($portfolioItems === null) {
            echo "Erreur lors du chargement des données JSON.";
            exit;
        }

        // Rechercher l'élément dans le tableau par son ID
        $itemToEdit = null;
        foreach ($portfolioItems as $item) {
            if ($item['id'] == $id) {
                $itemToEdit = $item;
                break;
            }
        }

        // Vérifier si l'élément à éditer a été trouvé
        if ($itemToEdit !== null) {
            // Extraire les données de l'élément
            $category = $itemToEdit['category'];
            $title = $itemToEdit['title'];
            $description = $itemToEdit['description'];
            $image = $itemToEdit['image'];

            // Afficher le formulaire pré-rempli avec les données de l'élément
            ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Élément - BARKA BTP</title>
</head>

<body>
    <h2>Modifier un Élément</h2>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="category">Catégorie</label>
        <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($category); ?>"
            required><br><br>

        <label for="title">Titre</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required><br><br>

        <label for="image">Image</label>
        <input type="file" id="image" name="image" accept="image/*"><br><br>
        <img src="<?php echo htmlspecialchars($image); ?>" alt="Image actuelle" style="max-width: 200px;"><br><br>

        <label for="description">Description</label><br>
        <textarea id="description" name="description" rows="4" cols="50"
            required><?php echo htmlspecialchars($description); ?></textarea><br><br>

        <button type="submit" name="submit">Modifier l'Élément</button>
    </form>
</body>

</html>

<?php
        } else {
            echo "L'élément avec l'ID $id n'a pas été trouvé.";
        }
    } else {
        echo "ID d'élément non spécifié.";
    }
}
?>