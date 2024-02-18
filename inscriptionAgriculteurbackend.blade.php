<?php
require("Page d'acceuil PFA Connexion BD.blade.php");
if((isset($_POST['cin'])) && (isset($_POST['nom'])) && (isset($_POST['prenom'])) && (isset($_POST['mdp'])) && (isset($_POST['email'])) && (isset($_POST['numtel'])) && (isset($_POST['inscrire']))){
    $cin=isset($_POST['cin']) ? $_POST['cin'] : '';
    $nom=isset($_POST['nom']) ? $_POST['nom'] : '';
    $prenom=isset($_POST['prenom']) ? $_POST['prenom'] : '';
    $mdp=isset($_POST['mdp']) ? $_POST['mdp'] : '';
    $email=isset($_POST['email']) ? $_POST['email'] : '';
    $numtel=isset($_POST['numtel']) ? $_POST['numtel'] : '';
    if((!empty($nom)) && (!empty($prenom)) && (!empty($cin)) && (!empty($mdp)) && (!empty($email)) && (!empty($numtel))){
        $c=connexionBD();
        $stat1=$c->query("INSERT INTO agriculteurs (Cin,Nom,Prènom,MotDePasse,Email,NumTel) VALUES ('$cin','$nom','$prenom','$mdp','$email','$numtel');");
        if($stat1->execute()){
            echo "Inscription réussie";
            $d=deconnexionBD();
        }
        else{
            echo "Inscription échouée,veuillez réessayer";
        }
    }
}
else{
    echo "non valide";
}
?>