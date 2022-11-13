<?php

class CategorieManager extends BDD
{
    public function getCategories()
    {
        $co = $this->getCo();
        $req = $co->prepare("SELECT * FROM categories");
        $req->execute();
        $categories = $req->fetchAll();

        return $categories;
    }

    public function getOneById($id)
    {
        $co = $this->getCo();
        $req = $co->prepare("SELECT * FROM categories WHERE id = ?");
        $req->execute([$id]);
        $categorie = $req->fetch();

        return $categorie;
    }

    public function addCategorie($nom)
    {
        $co = $this->getCo();
        $req = $co->prepare("INSERT INTO categories (nom) VALUES (?)");
        $req->execute([$nom]);

        return $req->rowCount();
    }

    public function updateCategorie($id, $nom)
    {
        $co = $this->getCo();
        $req = $co->prepare("UPDATE categories SET nom = ? WHERE id = ?");
        $req->execute([$nom, $id]);

        return $req->rowCount();
    }

    public function deleteCategorie($id)
    {
        $co = $this->getCo();
        $req = $co->prepare("DELETE FROM categories WHERE id = ?");
        $req->execute([$id]);

        return $req->rowCount();
    }
}
