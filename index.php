<?php 
session_start();

require_once 'poo/user.php';
require_once 'poo/perso.php';
require_once 'poo/admin.php';

$user = new User();
$perso = new Perso();
$admin = new Admin();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/diablo" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>ECF</title>
</head>
<body>



    <header class="H_container">
        
        <div class="H_img">
            
    <?php
            if (!empty($_SESSION)){

                $role = $user->role();

                if ($role == 1) {
                    echo '<a class="HP_img" href="index.php?page=adminPanel"></a>';
                }
            }
    ?>

        
        </div>

        <div class="btn_mega_container">  
            <div class="btn_container">
                <button class="btn"><a class="btnText" href="index.php?page=accueil">accueil</a></button>
            </div>
            <div class="btn_container">
                <button class="btn"><a class="btnText" href="index.php?page=contenu">contenu</a></button>
            </div>
            <div class="btn_container">
                <button class="btn"><a class="btnText" href="index.php?page=paramétre">paramétre</a></button>
            </div>
            <div class="btn_container">
    <?php
            if (empty($_SESSION)) {
                echo '
                    <button class="btn"><a class="btnText" href="index.php?page=connexion">connexion</a></button>
                ';
            }
            else { 
                echo '
                    <div class="btn">
                        <form method="post">
                            <input class="btndeco" type="submit" name="destroy" value="Déconnection">
                        </form>
                    </div>
                ';
            } 
    ?>
            </div> 
        </div> 

        <div class="menu">

            <input type="checkbox" id="hamburger">
            <label id="hamburger-logo" for="hamburger">☰</label>

            <nav>
            <a href="index.php?page=accueil">accueil</a>
            <a href="index.php?page=contenu">contenu</a>
            <a href="index.php?page=paramétre">paramétre</a>
    <?php      
            if (empty($_SESSION)) {
                echo '
                    <a href="index.php?page=connexion">connexion</a> 
                ';
            }
            else { 
                echo '
                    <form method="post">
                        <input class="btn_deco_burger" type="submit" name="destroy" value="Déconnection">
                    </form>
                ';
            } 
    ?>        
            </nav>
        </div>
    </header>

    

    <?php 


        if (isset($_POST['destroy'])) {
            session_destroy();
            echo '<p class="connect-error">Vous êtes déconnecter</p>';
            header("refresh:1; index.php?page=connexion");
        }

        if (isset($_GET['page']) && $_GET['page'] == "accueil") {
    ?> 
            <h1 class="TITRE">Diablo IV L'histoire</h1>

            <section class="container_empty_accueil">
                <div class="histoire1" >
                    <div class="text_histoire1">
                        <p>Diablo 4 se situe 50 ans après Diablo 3 et le monde de Sanctuaire a été épargné des invasions par les démons inférieurs et le Démon Primordial. Cependant, un ordre religieux a commencé à vénérer l'ange déchu Inarius en tant que dieu et un petit culte a commencé à vénérer la princesse démon bannie Lilith.
                        <br><br>
                        Lilith est la fille de Mephisto. Elle a été bannie de l'Enfer par son père après qu'elle et Inarius soient tombés amoureux et aient créé le monde du Sanctuaire. Leur idée était de trahir à la fois le Ciel et l'Enfer et de vivre quelque part loin du Conflit Éternel. Cependant, leurs enfants Nephalem ont été vus comme une abomination par les anges et les démons et ils ont alors été chassés jusqu'à l'extinction.</p>
                    </div>
                    <div class="container_img_empty_accueil">
                        <img class="img_menphisto_empty_accueil" src="img/menphisto.png" alt="">
                    </div>
                </div>
            </section>
            <section class="container_empty_accueil">
                <div class="histoire1">
                    <div class="container_img_empty_accueil">
                        <img class="img_menphisto_empty_accueil" src="img/lillith.png" alt="">
                    </div>
                    <div class="text_histoire1">
                        <p>En réponse, Lilith est devenue une tyranne et a transformé ses enfants en armes pour combattre le Ciel et l'Enfer. Voyant que toute la réalité était en jeu, Inarius l'a projetée dans un oubli sombre et s'est ensuite exilé lui-même.
                        <br><br>
                        Au début de Diablo 4, le culte de Lilith réussit à la rappeler au Sanctuaire où elle commence à rattraper le temps perdu en essayant de prendre le contrôle du monde. Elle prévoit également une attaque contre l'Enfer pour détruire tous les démons et hériter de leur pouvoir, en commençant par son père Mephisto.</p>
                    </div>
                </div>
            </section>
            <section class="container_empty_accueil">
                <div class="histoire1" >
                    <div class="text_histoire1">
                        <p>Pendant ce temps, Inarius est fatigué du Sanctuaire et veut retourner au Ciel. Il pense qu'en tuant Lilith, il sera réintégré dans le conseil de l'Aegis. Il assassine même leur fils Rathma, le leader des Nécromanciens et un Nephalem, quand ce dernier refuse de prendre parti. Inarius aide le personnage joueur à chasser Lilith qui sème le chaos et la mort partout où elle passe. Cependant, il tente de contrecarrer leur plan d'emprisonner Lilith dans une pierre d'âme, voulant plutôt la tuer.</p>
                    </div>
                    <div class="container_img_empty_accueil">
                        <img class="img_menphisto_empty_accueil" src="img/inarius.png" alt="">
                    </div>
                </div>
            </section>
    <?php
        }
    ?> 

    <?php

        if (empty($_SESSION)) {

            if (isset($_GET['page']) && $_GET['page'] == "contenu"){
  
                echo '<p class="connect-error">Connecte-toi pour accéder au contenu de cette page.</p>';
            }

            if (isset($_GET['page']) && $_GET['page'] == "paramétre"){
  
                echo '<p class="connect-error">Connecte-toi pour accéder au contenu de cette page.</p>';
            }

            
            
            if (isset($_GET['page']) && $_GET['page'] == "connexion"){
            
                echo'
                    <div class="connexion">
                        <form class="form1" action="index.php" method="post">
        
                            <label class="label_all_form">Pseudo</label>
                            <input class="input_all_form" type="text" name="pseudo">
        
                            <label class="label_all_form">Mot de passe</label>
                            <input class="input_all_form" type="password" name="password">
        
                            <input class="log" type="submit" name="btn-user-pass" value="Se connecter">

                        </form>
                    </div>
                    <p class="inscrit" >Inscrit toi<a class="ici" href="index.php?page=inscription">ici</a></p>
                ';
            }
        
            
            
            
            if (isset($_GET['page']) && $_GET['page'] == "inscription"){

                echo'
                    <div class="inscription">
                        <form class="form1" action="index.php" method="post">
        
                            <label class="label_all_form">Adresse Mail</label>
                            <input class="input_all_form" type="mail" name="mail">
        
                            <label class="label_all_form">Pseudo</label>
                            <input class="input_all_form" type="text" name="pseudo">
        
                            <label class="label_all_form">Mot de passe</label>
                            <input class="input_all_form" type="password" name="mdp">
        
                            <input class="log" type="submit" name="btn-inscription-pass" value="Inscription">
        
                        </form>
                    </div>
                ';
            }
            
            if (isset($_POST['btn-inscription-pass'])) {
                $pseudo = $_POST['pseudo'];
                $mdp = $_POST['mdp'];
                $mail = $_POST['mail'];
        
                $user->register($pseudo, $mdp, $mail);
            }
            if (isset($_POST['btn-user-pass'])) {
                $mdp = $_POST['password'];
                $pseudo = $_POST['pseudo'];
        
                $user->login($pseudo, $mdp);
            }

        } 
            
        if (!empty($_SESSION)){


            if (isset($_GET['page']) && $_GET['page'] == "paramétre") {
                
                echo '
                    <div class="connexion"> 
                    
                    
                        <form class="form1" method="post">
                            
                            <p class="infoCompte">Vous pouvez changer les informations de votre compte</p>
                           
                            <label class="label_all_form">Pseudo</label>
                            <input class="input_all_form" type="text" name="pseudo" placeholder="Nouveau Pseudo">
            
                            <label class="label_all_form">Mot de passe</label>
                            <input class="input_all_form" type="password" name="password" placeholder="Nouveau MDP">
            
                            <input class="log" type="submit" name="up-submit" value="valider">
            
                        </form>
                    </div>
                '; 
            }
                
            if (isset($_POST['up-submit'])) {
                $pseudo = $_POST['pseudo'];
                $password = $_POST['password'];
                
                $user->updateUser($_SESSION['id_utilisateur'], $pseudo, $password);
            }

        
    ?>

    <?php
            if (isset($_GET['page']) && $_GET['page'] == "contenu") {
    
                $result = $perso->getPerso();   
    ?>
                    
            <section class="cards-container">
    <?php
                $result = $perso->cards($result);
    
            }
    ?>
            </section>
    <?php
            if (isset($_GET['page']) && $_GET['page'] == "adminPanel") {

                $result = $admin->getPersoAdmin(); 
    ?> 
                <section class="cards-container">
    <?php
                $result = $admin->cardsAdmin($result);
    
            }          
           
    ?> 
                </section>
<?php 
        }
    
        ?>


        
        


   
<!-- if (isset($_GET['page']) && $_GET['page'] == "#"){ } -->

<footer>
    <div class="footer">
        <p class="footerText">
            website create by Montana Corporation

        </p>
    </div>
</footer>


</body>
</html>