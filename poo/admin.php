<?php

require_once 'Database.php';

class Admin extends Database {

    public function getPersoAdmin() {
        $dbConnect = $this->dbConnect;

        $sql = "SELECT 
            classes.id_classes,
            classes.nom_classes,
            GROUP_CONCAT(competence.id_competence) AS id_competences,
            GROUP_CONCAT(competence.nom_competence ORDER BY competence_utiliser.ordre) AS competences,
            GROUP_CONCAT(competence.descriptif_competence ORDER BY competence_utiliser.ordre) AS descriptifs,
            GROUP_CONCAT(competence_utiliser.ordre) AS ordres
        FROM `classes`
        INNER JOIN `competence_utiliser` ON competence_utiliser.id_classes = classes.id_classes
        INNER JOIN `competence` ON competence.id_competence = competence_utiliser.id_competence
        GROUP BY classes.id_classes";

        $stmt = $dbConnect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cardsAdmin($result) {
        foreach ($result as $value) {
            echo '
                <div class="card_container">
                    <div class="card">
                        <h4 class="nom_classes">' . $value['nom_classes'] . '</h4>
                        
            ';
            
            $id_competences = explode(',', $value['id_competences']);
            $competences = explode(',', $value['competences']);
            $descriptifs = explode(',', $value['descriptifs']);
            $ordres = explode(',', $value['ordres']);
    
            for ($i = 0; $i < count($competences); $i++) {
                echo'
                    <form method="post">
                        <input type="hidden" name="id_competence" value="' . $id_competences[$i] . '">
                        <p class="comp_nom">Compétence: ' . $competences[$i] . '</p>
                        <label for="ordre">Nouvel ordre:</label>
                        <input type="text" name="ordre" value="' . $ordres[$i] . '">
                        <input type="submit" name="update_ordre" value="Mettre à jour">
                    </form>
                ';
            }
                echo'
                      </div>
                  </div>
                  
            ';
            if (isset($_POST['update_ordre'])) {
                $id_competence = $_POST['id_competence'];
                $new_ordre = $_POST['ordre'];
                
                $dbConnect = $this->dbConnect;
    
            
            $sql = "UPDATE `competence_utiliser` 
                    SET `ordre`=?
                    WHERE `id_competence`=?";
            $stmt = $dbConnect->prepare($sql);
            $stmt->execute([$new_ordre, $id_competence]);
            
            }
        }
    }
    
        }
    



