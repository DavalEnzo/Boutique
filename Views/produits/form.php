<form method="post" class="mx-auto w-1/2 bg-indigo-800 my-20 rounded-lg shadow-2xl shadow-indigo-800/50 p-4">
    <h2 class="text-white text-3xl my-2 text-center">
        Formulaire <?= (isset($produit)) ? "de modification" : "d'ajout"; ?> de produit</h2>
    <div class="mb-6">
        <label for="nom" class="block mb-2 text-sm font-medium text-white">Nom</label>
        <input id="nom"
               name="nom"
               value="<?= (isset($produit) ? $produit["nom"] : ""); ?>"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               required="">
    </div>
    <div class="mb-6">
        <label for="description" class="block mb-2 text-sm font-medium text-white">Description</label>
        <textarea id="description" name="description" rows="4"
                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?= (isset($produit) ? $produit["description"] : ""); ?></textarea>

    </div>
    <div class="mb-6">
        <label for="quantite" class="block mb-2 text-sm font-medium text-white">Quantite</label>
        <input id="quantite"
               name="quantite"
               type="number"
               min="0"
               value="<?= (isset($produit) ? $produit["quantite"] : ""); ?>"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               required="">
    </div>
    <div class="mb-6">
        <label for="prix" class="block mb-2 text-sm font-medium text-white">Prix</label>
        <input id="prix"
               name="prix"
               value="<?= (isset($produit) ? $produit["prix"] : ""); ?>"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               required="">
    </div>
    <div class="mb-6">
        <label for="categorie" class="block mb-2 text-sm font-medium text-white">Sélectionner une
            catégorie</label>
        <select id="categorie" name="categorie"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <?php foreach ($categories as $categorie) {
                ?>
                <option <?php if (isset($produit) && $categorie['id'] == $produit['categorie_id']) {
                    echo 'selected';
                }; ?> value="<?= $categorie["id"]; ?>"><?= $categorie["nom"]; ?>
                </option>
                <?php
            }
            ?>
        </select>

        <button type="submit"
                name="produit"
                value="<?= (isset($produit)) ? "modification" : "ajout"; ?>"
                class="block text-center m-auto my-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <?= (isset($produit)) ? "modifier" : "ajouter"; ?>
        </button>
</form>
