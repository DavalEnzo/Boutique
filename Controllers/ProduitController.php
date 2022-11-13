<?php

class ProduitController extends ProduitManager
{
    public function getProduits()
    {
        ob_start();

        $produits = $this->findAll();

        require_once 'Views/produits/index.php';

        $page = ob_get_clean();
        return $page;
    }

    public function getProduitsByCategorie()
    {
        ob_start();

        $produits = $this->getProduitByCategorie();

        require_once 'Views/categories/index.php';

        $page = ob_get_clean();
        return $page;
    }

    public function getForm()
    {
        ob_start();

        $categoriesManager = new CategorieManager();

        $categories = $categoriesManager->getCategories();

        require_once 'Views/produits/form.php';
        $page = ob_get_clean();
        return $page;
    }

    public function validation($post)
    {
        if (isset($post['nom']) && !empty($post['nom'])
            && isset($post['description']) && !empty($post['description'])
            && isset($post['quantite']) && !empty($post['quantite']) && is_numeric($post['quantite'])
            && isset($post['prix']) && !empty($post['prix']) && is_numeric($post['prix'])
            && isset($post['categorie']) && !empty($post['categorie']) && is_numeric($post['categorie'])) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id)
    {
        ob_start();

        $produit = $this->getOneById($id);

        $categoriesManager = new CategorieManager();

        $categories = $categoriesManager->getCategories();

        require_once 'Views/produits/form.php';
        $page = ob_get_clean();
        return $page;
    }

    public function save($post)
    {
        if ($this->validation($post)) {
            if ($this->addProduit($post["nom"], $post["prix"], $post["description"], $post["quantite"], $post["categorie"]) > 0) {
                header("Location: ?page=produits&success=1");
            } else {
                header("Location: ?page=produits&success=0");
            }
        }
    }

    public function persistUpdate($id, $post)
    {
        if ($this->validation($post)) {
            if ($this->updateProduit($id, $post["nom"], $post["prix"], $post["description"], $post["quantite"], $post["categorie"]) > 0) {
                header("Location: ?page=produits&success=2");
            } else {
                header("Location: ?page=produits&success=0");
            }
        }
    }

    public function delete($id)
    {
        if ($this->deleteProduit($id) > 0) {
            header("Location: index.php?page=produits&success=3");
        } else {
            header("Location: index.php?page=produits&success=4");
        }
    }
}
