<form method="post" class="mx-auto w-1/2 bg-indigo-800 my-20 rounded-lg shadow-2xl shadow-indigo-800/50 p-4">
    <h2 class="text-white text-3xl my-2 text-center">
        Modification du rôle de l'utilisateur <?= strtoupper($utilisateur["nom"]). " ". $utilisateur["prenom"]; ?></h2>
    <div class="mb-6">
        <label for="role" class="block mb-2 text-sm font-medium text-white">Sélectionner le rôle</label>
        <select id="role" name="role"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <?php foreach ($roles as $role) {
                ?>
                <option <?php if ($role['id'] == $utilisateur['role_id']) {
                    echo 'selected';
                }; ?> value="<?= $role["id"]; ?>"><?= $role["role"]; ?>
                </option>
                <?php
            }
            ?>
        </select>
    </div>
        <button type="submit"
                name="utilisateur"
                class="block text-center m-auto my-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            modifier
        </button>
</form>
