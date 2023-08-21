<?php

require_once 'database.php';

class User extends Database {
    public function register($pseudo, $mdp, $mail) {
        if (empty($pseudo) || empty($mdp) || empty($mail)) {
            echo '<p class="connect-error">Veuillez remplir tous les champs nécessaires.</p>';
            return;
        }

        $dbConnect = $this->dbConnect;

        $sql_check_unique = "SELECT COUNT(*) FROM utilisateurs WHERE mail = ?";
        $stmt_check_unique = $dbConnect->prepare($sql_check_unique);
        $stmt_check_unique->execute([$mail]);
        $count = $stmt_check_unique->fetchColumn();

        if ($count > 0) {
            echo '<p class="connect-error">Cette adresse e-mail est déjà utilisée. Veuillez en choisir une autre.</p>';
        } else {
            $sql = "INSERT INTO `utilisateurs`(`pseudo`, `password`, `mail`) 
                    VALUES (?, ?, ?)";
            $stmt = $dbConnect->prepare($sql);
            $stmt->execute([$pseudo, $mdp, $mail]);

            echo '<p class="connect">Vous êtes maintenant inscrit, connectez-vous.</p>';
            header("refresh: 1.5; index.php?page=connexion");
        }
    }

    public function login($pseudo, $mdp) {
        
        $dbConnect = $this->dbConnect;

        $query = "SELECT `id_utilisateur`, `pseudo`, `password` FROM utilisateurs WHERE pseudo = :pseudo";
        $stmt = $dbConnect->prepare($query);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            if ($mdp == $row['password']) {

                $_SESSION['id_utilisateur'] = $row['id_utilisateur'];
                $_SESSION['pseudo'] = $pseudo;

                echo '<p class="connect">Vous êtes maintenant connecté</p>';
                header("refresh: 1.5; index.php?page=accueil");
                exit;
            }
        }

        echo '<p class="connect-error">Mot de passe ou identifiant incorrect</p>';
        header("refresh: 1.5; index.php?page=accueil");
    }


    public function role() {

        $dbConnect = $this->dbConnect;

        $userId = $_SESSION['id_utilisateur'];
        $sql = "SELECT role FROM utilisateurs WHERE id_utilisateur = :userId";
        $stmt = $dbConnect->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result !== false) {
            return $result['role'];
        }
        
        return 0;
    }

    public function updateUser($userId, $pseudo, $password) {

        if (empty($pseudo) || empty($password)) {
            echo '<p class="connect-error">Veuillez remplir tous les champs nécessaires.</p>';
            return;
        }
        
        $dbConnect = $this->dbConnect;
    
        $sql = "UPDATE `utilisateurs`
                SET `pseudo`=?, `password`=?
                WHERE `id_utilisateur`=?";
        $stmt = $dbConnect->prepare($sql);
        $stmt->execute([$pseudo, $password, $userId]);
    
        echo '<p class="connect">Vos informations ont été mises à jour</p>';
    
        header("refresh: 1.5; index.php?page=accueil");
    }
    
    }
    

?>