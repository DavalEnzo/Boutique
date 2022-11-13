<?php

class ProduitManager extends BDD
{
    public function findAll()
    {
        $co = $this->getCo();
        $req = $co->prepare("SELECT * FROM produits");
        $req->execute();
        $produits = $req->fetchAll();

        return $produits;
    }

    public function getOneById($id)
    {
        $co = $this->getCo();
        $req = $co->prepare("SELECT * FROM produits WHERE id = ?");
        $req->execute([$id]);
        $produit = $req->fetch();

        return $produit;
    }


    public function getProduitByCategorie()
    {
        $co = $this->getCo();
        $req = $co->prepare("SELECT *, produits.nom n FROM produits LEFT JOIN categories ON produits.categorie_id = categories.id");
        $req->execute();
        $produits = $req->fetchAll();

        return $produits;
    }

    public function addProduit($nom, $prix, $description, $quantite, $categorie)
    {
        $co = $this->getCo();
        $req = $co->prepare("INSERT INTO produits (nom, prix, description, quantite, categorie_id) VALUES (?, ?, ?, ?, ?)");
        $req->execute([$nom, $prix, $description, $quantite, $categorie]);

        return $req->rowCount();
    }

    public function updateProduit($id, $nom, $prix, $description, $quantite, $categorie)
    {
        $co = $this->getCo();
        $req = $co->prepare("UPDATE produits SET nom = ?, prix = ?, description = ?, quantite = ?, categorie_id= ? WHERE id = ?");
        $req->execute([$nom, $prix, $description, $quantite, $categorie, $id]);

        return $req->rowCount();
    }

    public function deleteProduit($id)
    {
        $co = $this->getCo();
        $req = $co->prepare("DELETE FROM produits WHERE id = ?");
        $req->execute([$id]);

        return $req->rowCount();
    }
}
