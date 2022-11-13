<?php

if (isset($_GET["inscription"])) {
    if ($_GET["inscription"] == 1) {
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
                <span class="font-medium">Inscription réussie !</span> Vous pouvez maintenant vous connecter.
            </div>
        </div>
        <?php
    } else if ($_GET["inscription"] == 0) {
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
                <span class="font-medium">Erreur: </span> Vous êtes déjà inscrit, veuillez vous connecter.
            </div>
        </div>
        <?php
    }

    if (isset($_GET["connexion"])) {
        if ($_GET["connexion"] == 0) {
            ?>
            <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                 role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                     viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Erreur: </span> Votre compte n'a pas été trouvé.
                </div>
            </div>
            <?php
        }
    }
}
?>

<form method="post" class="mx-auto w-1/2 bg-blue-600 my-20 rounded-lg shadow-2xl shadow-red-800/50 p-4">
    <h2 class="text-white text-3xl my-2 text-black text-center">
        Connexion</h2>
    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm text-black font-medium">Adresse Mail</label>
        <input id="email"
               type="text"
               name="email"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               required="">
    </div>
    <div class="mb-6">
        <label for="mdp" class="block mb-2 text-sm font-medium text-black">Mot de passe</label>
        <input id="mdp"
               name="mdp"
               type="password"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               required="">
    </div>
    <button type="submit"
            name="connexion"
            class="block text-center m-auto my-5 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
        Se connecter
    </button>
</form>
