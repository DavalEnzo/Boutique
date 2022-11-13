<?php
if (isset($_GET["success"])) {
    if ($_GET["success"] >= 1 && $_GET["success"] <= 2) {
        ?>
        <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
             role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                      clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Succès !</span> Le produit a bien
                été <?= ($_GET["success"] == 1) ? "ajouté" : "modifié"; ?>.
            </div>
        </div>
        <?php
    } else if ($_GET["success"] == 0) {
        ?>
        <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
             role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                      clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Erreur: </span> Ajout du produit impossible.
            </div>
        </div>
        <?php
    } else if ($_GET["success"] == 3) {
        ?>
        <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
             role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                      clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Succès: </span> Produit supprimé.
            </div>
        </div>
        <?php
    } else if ($_GET["success"] == 4) {
        ?>
        <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
             role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                      clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Erreur: </span> Erreur lors de la suppression du produit.
            </div>
        </div>
        <?php
    }
    header("Refresh: 3; ?page=produits");
}
?>

<h1 class="text-5xl text-center my-5 underline">Liste des produits</h1>


<button id="dropdownDefault" data-dropdown-toggle="dropdown"
        class="mx-auto active:rotate-180 active:transition duration-500 mt-10 text-white bg-green-700 hover:bg-green-800 rounded-full w-10 h-10 flex justify-center items-center"
        type="button">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
    </svg>
</button>
<!-- Dropdown menu -->
<div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700"
     style="position: absolute; inset: 0 auto auto 0; margin: 0; transform: translate(0px, 214px);"
     data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
        <li>
            <a href="?page=ajouter_produit"
               class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ajouter un
                produit</a>
        </li>
        <li>
            <a href="?page=ajouter_categorie"
               class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ajouter une
                catégorie</a>
        </li>
    </ul>
</div>


<div class="flex flex-wrap justify-center my-24">
    <?php

    if (!empty($produits)) {
        foreach ($produits as $produit) {
            ?>
            <div
                    class="flex flex-col text-center w-2/12 min-w-fit my-2 p-6 mx-2 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-center underline md:text-4xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $produit["nom"]; ?></h5>
                    <p class="my-2 text-center text-gray-500"><?= $produit["description"]; ?></p>
                    <p class="my-2">Prix: <?= number_format($produit["prix"], 2); ?> €</p>
                    <p class="my-2">Quantité: <?= $produit["quantite"]; ?></p>
                <?php
                if (isset($_SESSION["utilisateur"]) && $_SESSION["utilisateur"]["role"] == 2) {
                ?>
                <div class="flex gap-2 justify-center my-5">
                    <a type="button"
                       href="?page=modifier_produit&id=<?= $produit["id"]; ?>"
                       class="flex justify-center gap-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        modifier</a>
                    <a type="button"
                       href="?page=delete_produit&id=<?= $produit["id"]; ?>"
                       class="flex justify-center gap-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>supprimer</a>
                </div>
                <?php
                }
                ?>
            </div>
            <?php
        }

    } else {
        ?>
        <h2 class="text-center text-2xl">Aucun produit</h2>
        <?php
    }
    ?>
</div>


