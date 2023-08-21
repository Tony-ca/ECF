<?php

require_once 'Database.php';


class Perso extends Database {
    public function getPerso() {
        $dbConnect = $this->dbConnect;

        $sql = "SELECT 
            classes.id_classes,
            classes.nom_classes,
            GROUP_CONCAT(competence.nom_competence ORDER BY competence_utiliser.ordre) AS competences,
            GROUP_CONCAT(competence.descriptif_competence ORDER BY competence_utiliser.ordre) AS descriptifs

        FROM `classes`
        INNER JOIN `competence_utiliser` ON competence_utiliser.id_classes = classes.id_classes
        INNER JOIN `competence` ON competence.id_competence = competence_utiliser.id_competence
        GROUP BY classes.id_classes";

        $stmt = $dbConnect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cards($result) {
        foreach ($result as $value) {
            echo '
                <div class="card_container">
                    <div class="card">
                        <h4 class="nom_classes">' . $value['nom_classes'] . '</h4>
                        
            ';

            $competences = explode(',', $value['competences']);
            $descriptifs = explode(',', $value['descriptifs']);


            for ($i = 0; $i < count($competences); $i++) {
                echo'
                    <p class="comp_nom">Compétence: ' . $competences[$i] . '</p>
                    <p class="comp_descri">Descriptif: ' . $descriptifs[$i] . '</p>

                ';
            }
                echo'
                      
                    </div>
                </div>
            ';
        }
    }
}



