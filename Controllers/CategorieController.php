<?php

class CategorieController extends CategorieManager
{
    public function findAll()
    {
        ob_start();

        $categories = $this->getCategories();
        $produitsManager = new ProduitManager();
        $produits = $produitsManager->getProduitByCategorie();

        require_once 'Views/categories/index.php';

        $page = ob_get_clean();
        return $page;
    }

    public function isValid($post)
    {
        if (isset($post['nom']) && !empty($post['nom'])) {
            return true;
        } else {
            return false;
        }
    }

    public function save($post)
    {
        if (isset($_SESSION["utilisateur"]) && !empty($_SESSION["utilisateur"]) && $_SESSION["utilisateur"]['role'] == 2) {
            if ($this->isValid($post)) {
                if ($this->addCategorie($post['nom']) > 0) {
                    header('Location: ?page=categories&success=1');
                } else {
                    header('Location: ?page=categories&success=0');
                }
            }
        } else {
            header('Location: ?page=categories&authorization=refused');
        }
    }

    public function update($id)
    {
        if (isset($_SESSION["utilisateur"]) && !empty($_SESSION["utilisateur"]) && $_SESSION["utilisateur"]['role'] == 2) {
            ob_start();

            $categorie = $this->getOneById($id);

            require_once 'Views/categories/form.php';
            $page = ob_get_clean();
            return $page;
        } else {
            header('Location: ?page=categories&authorization=refused');
        }
    }

    public function persistUpdate($id, $post)
    {
        if ($this->isValid($post)) {
            if ($this->updateCategorie($id, $post['nom']) > 0) {
                header('Location: ?page=categories&success=2');
            } else {
                header('Location: ?page=categories&success=0');
            }
        }
    }

    public function delete($id)
    {
        if (isset($_SESSION["utilisateur"]) && !empty($_SESSION["utilisateur"]) && $_SESSION["utilisateur"]['role'] == 2) {
            if ($this->deleteCategorie($id) > 0) {
                header('Location: ?page=categories&success=3');
            } else {
                header('Location: ?page=categories&success=0');
            }
        } else {
            header('Location: ?page=categories&authorization=refused');
        }
    }

    public function getForm()
    {
        if (isset($_SESSION["utilisateur"]) && !empty($_SESSION["utilisateur"]) && $_SESSION["utilisateur"]['role'] == 2) {
            ob_start();
            require_once 'Views/categories/form.php';
            $page = ob_get_clean();
            return $page;
        } else {
            header('Location: ?page=categories&authorization=refused');
        }
    }
}
