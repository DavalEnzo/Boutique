<h1 class="text-center text-4xl underline my-10">Liste des utilisateurs</h1>

<?php
if (isset($utilisateurs) && !empty($utilisateurs)) {
    ?>
    <div class="overflow-x-auto flex justify-center">
        <table class="text-sm w-full text-center text-left text-gray-500 dark:text-gray-400 my-10">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Nom et Prénom
                </th>
                <th scope="col" class="py-3 px-6">
                    Email
                </th>
                <th scope="col" class="py-3 px-6">
                    Rôle
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
            <?php
            foreach ($utilisateurs

            as $utilisateur) {
            ?>
            </thead>
            <tbody>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?= strtoupper($utilisateur["nom"]) . " " . $utilisateur["prenom"]; ?>
                </th>
                <td class="py-4 px-6">
                    <?= $utilisateur["email"]; ?>
                </td>
                <td class="py-4 px-6">
                    <?= $utilisateur["role"]; ?>
                </td>
                <td class="py-4 px-6">
                    <a href="?page=modifier_utilisateur&id=<?= $utilisateur["id"]; ?>" type="button"
                       class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-300 font-medium rounded-full text-sm px-3 py-1 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modifier</a>
                </td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php
} else {
    ?>
    <h2 class="text-center text-2xl">Aucun utilisateur</h2>
    <?php
}
