<?php

class UtilisateurManager extends BDD
{
    public function getUtilisateurs()
    {
        $co = $this->getCo();
        $req = $co->prepare("SELECT utilisateurs.id, nom, prenom, email, role_id, roles.role FROM utilisateurs LEFT JOIN roles ON utilisateurs.role_id = roles.id");
        $req->execute();
        $utilisateurs = $req->fetchAll();

        return $utilisateurs;
    }

    public function getRoles()
    {
        $co = $this->getCo();
        $req = $co->prepare("SELECT * FROM roles");
        $req->execute();
        $roles = $req->fetchAll();

        return $roles;
    }

    public function getOneById($id)
    {
        $co = $this->getCo();
        $req = $co->prepare("SELECT * FROM utilisateurs WHERE id = ?");
        $req->execute([$id]);
        $utilisateur = $req->fetch();

        return $utilisateur;
    }

    public function addUtilisateur($nom, $prenom, $email, $mdp)
    {
        $co = $this->getCo();
        $req = $co->prepare("INSERT INTO utilisateurs (nom, prenom, email, mdp) VALUES (?, ?, ?, ?)");
        $req->execute([$nom, $prenom, $email, $mdp]);

        return $req->rowCount();
    }

    public function updateUtilisateurRole($id, $role)
    {
        $co = $this->getCo();
        $req = $co->prepare("UPDATE utilisateurs SET role_id = ? WHERE id = ?");
        $req->execute([$role, $id]);

        return $req->rowCount();
    }

    public function deleteUtilisateur($id)
    {
        $co = $this->getCo();
        $req = $co->prepare("DELETE FROM utilisateurs WHERE id = ?");
        $req->execute([$id]);

        return $req->rowCount();
    }

    public function getOneByEmail($email)
    {
        $co = $this->getCo();
        $req = $co->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $req->execute([$email]);
        $utilisateur = $req->fetch();

        return $utilisateur;
    }

    public function getOneByEmailAndMdp($email, $mdp)
    {
        $co = $this->getCo();
        $req = $co->prepare("SELECT * FROM utilisateurs WHERE email = ? AND mdp = ?");
        $req->execute([$email, $mdp]);
        $utilisateur = $req->fetch();

        return $utilisateur;
    }
}
