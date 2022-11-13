<?php

class UtilisateurController extends UtilisateurManager
{
    public function findAll()
    {
        if (isset($_SESSION["utilisateur"]) && !empty($_SESSION["utilisateur"]) && $_SESSION["utilisateur"]['role'] == 2) {
            ob_start();
            $utilisateurs = $this->getUtilisateurs();
            require_once 'Views/utilisateurs/liste.php';
            $page = ob_get_clean();
            return $page;
        } else {
            header('Location: ?page=produits&authorization=refused');
        }
    }

    public function pageConnexion()
    {
        ob_start();
        require_once 'Views/authentification/connexion.php';
        $page = ob_get_clean();
        return $page;
    }

    public function pageInscription()
    {
        ob_start();
        require_once 'Views/authentification/inscription.php';
        $page = ob_get_clean();
        return $page;
    }

    public function connexion($post)
    {
        if ($this->isValidConnexion($post)) {
            $utilisateur = $this->getOneByEmail($post['email']);
            if (isset($utilisateur) && !empty($utilisateur)) {
                if (password_verify($post['mdp'], $utilisateur['mdp'])) {
                    $_SESSION["utilisateur"]['email'] = $utilisateur['email'];
                    $_SESSION["utilisateur"]['prenom'] = $utilisateur["prenom"];
                    $_SESSION["utilisateur"]['nom'] = $utilisateur["nom"];
                    $_SESSION["utilisateur"]['role'] = $utilisateur["role_id"];
                    header('Location: ?page=produits&connexion=1');
                } else {
                    header('Location: ?page=connexion&connexion=0');
                }
            } else {
                header('Location: ?page=produits&connexion=0');
            }
        }
    }

    public function isValid($post)
    {
        if (isset($post['role']) && !empty($post['role']) && is_numeric($post['role'])) {
            return true;
        } else {
            return false;
        }
    }

    public function inscription($post)
    {
        if ($this->isValidInscription($post)) {
            $utilisateur = $this->getOneByEmail($post['email']);
            if (isset($utilisateur) && !empty($utilisateur)) {
                header('Location: ?page=connexion&inscription=2');
            } else {
                $mdpCrypte = password_hash($post['mdp'], PASSWORD_BCRYPT);
                if ($this->addUtilisateur($post['nom'], $post['prenom'], $post['email'], $mdpCrypte) > 0) {
                    header('Location: ?page=connexion&inscription=1');
                } else {
                    header('Location: ?page=inscription&inscription=0');
                }
            }
        }
    }

    public function isValidConnexion($post)
    {
        if (isset($post['email']) && !empty($post['email']) && isset($post['mdp']) && !empty($post['mdp'])) {
            return true;
        } else
            return false;
    }

    public function update($id)
    {
        if (isset($_SESSION["utilisateur"]) && !empty($_SESSION["utilisateur"]) && $_SESSION["utilisateur"]['role'] == 2) {
            ob_start();

            $utilisateur = $this->getOneById($id);
            $roles = $this->getRoles();
            require_once 'Views/utilisateurs/modification.php';
            $page = ob_get_clean();
            return $page;
        } else {
            header('Location: ?page=produits&authorization=refused');
        }
    }

    public function persistUpdate($id, $post)
    {
        if ($this->isValid($post)) {
            if ($this->updateUtilisateurRole($id, $post['role']) > 0) {
                $_SESSION["utilisateur"]['role'] = $post['role'];
                header('Location: ?page=utilisateurs&success=1');
            } else {
                header('Location: ?page=utilisateurs&success=0');
            }
        }
    }

    public function deconnexion()
    {
        session_destroy();
        header('Location: ?page=produits?deconnexion=1');
    }

    public function isValidInscription($post)
    {
        if (isset($post['nom']) && !empty($post['nom']) && isset($post['prenom']) && !empty($post['prenom']) && isset($post['email']) && !empty($post['email']) && isset($post['mdp']) && !empty($post['mdp'])) {
            return true;
        } else {
            return false;
        }
    }
}
