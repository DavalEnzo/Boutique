<?php
session_start();

var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css"/>
    <title>Boutique</title>
</head>
<body>
<header>
    <nav class="relative px-4 py-4 flex justify-center items-center bg-orange-800">
        <div class="w-48"></div>
        <ul class="w-6/12 flex items-center justify-center space-x-6">
            <li><a class="text-gray-400 hover:text-gray-500" href="?page=produits">Accueil</a></li>
            <li class="text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                </svg>
            </li>
            <li><a class="text-gray-400 hover:text-gray-500" href="?page=categories">Catégories</a></li>
            <li class="text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                </svg>
            </li>
            <li><a class="text-gray-400 hover:text-gray-500" href="#">Comptes</a></li>
        </ul>
        <?php
        if (isset($_SESSION['utilisateur']) && !empty($_SESSION["utilisateur"])) {
            ?>
            <div>
            <a type="button"
               href="?page=liste_utilisateurs"
               class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                Liste d'utilisateurs
            </a>
            <?php
        } else {
            ?>
            <a type="button"
               class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-2 py-1 text-center mr-2"
               href="?page=connexion">
                Connexion
            </a>
            <a type="button"
               href="?page=inscription"
               class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-2 py-1 text-center">
                Inscription
            </a>
            </div>
            <?php
        }
        ?>
    </nav>
</header>

<?php

require_once 'Class/Autoload.php';
Autoload::load();

if (isset($_GET['page'])) {
    switch ($_GET["page"]) {

        case "produits":
            $controller = new ProduitController();
            echo $controller->getProduits();
            break;

        case "ajouter_produit":

            $controller = new ProduitController();
            if (!empty($_POST)) {
                $controller->save($_POST);
            } else {
                echo $controller->getForm();
            }
            break;

        case "modifier_produit":

            $controller = new ProduitController();
            if (!empty($_POST)) {
                $controller->persistUpdate($_GET["id"], $_POST);
            } else {
                echo $controller->update($_GET["id"]);
            }
            break;

        case "delete_produit":

            $controller = new ProduitController();
            if (!empty($_GET["id"])) {
                $controller->delete($_GET["id"]);
            } else {
                echo '<div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
             role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                      clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Erreur: </span> Produit introuvable. Vous allez être redirigé vers la page d\'accueil.
            </div>
        </div>';
                header("Refresh: 2; url=index.php?page=produits");
            }
            break;

        case "categories":

            $controller = new CategorieController();
            echo $controller->findAll();
            break;

        case "ajouter_categorie":

            $controller = new CategorieController();
            if (!empty($_POST)) {
                $controller->save($_POST);
            } else {
                echo $controller->getForm();
            }
            break;

        case "modifier_categorie":

            $controller = new CategorieController();
            if (isset($_GET["id"]) && !empty($_GET["id"])) {
                if (!empty($_POST)) {
                    $controller->persistUpdate($_GET["id"], $_POST);
                } else {
                    echo $controller->update($_GET["id"]);
                }
            } else {
                echo '<div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
             role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                      clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Erreur: </span> Catégorie introuvable. Vous allez être redirigé vers la page d\'accueil.
            </div>
        </div>';
                header("Refresh: 2; url=index.php?page=categories");
            }
            break;

        case "delete_categorie":

            $controller = new CategorieController();
            if (isset($_GET["id"]) && !empty($_GET["id"])) {
                $controller->delete($_GET["id"]);
            }
            break;

        case "connexion":

            $controller = new UtilisateurController();
            if (isset($_POST) && !empty($_POST)) {
                $controller->connexion($_POST);
            } else {
                echo $controller->pageConnexion();
            }
            break;

        case "liste_utilisateurs":

            $controller = new UtilisateurController();
            $controller->findAll();
            break;

        case "inscription":

            $controller = new UtilisateurController();
            if (isset($_POST) && !empty($_POST)) {
                $controller->inscription($_POST);
            } else {
                echo $controller->pageInscription();
            }
            break;

        default:
            header("Location: ?page=produits");
            break;
    }
} else {
    echo "Page introuvable";
}

?>
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

