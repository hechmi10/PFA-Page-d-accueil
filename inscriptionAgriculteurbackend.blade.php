<?php
@include("'Page d'acceuil PFA Connexion BD.blade.php");
$c=connexionBD();
if((isset($_HEAD['cin'])) && (isset($_HEAD['nom'])) && (isset($_HEAD['prenom'])) && (isset($_HEAD['mdp'])) && (isset($_HEAD['email'])) && (isset($_HEAD['numtel']))){
    $cin=isset($_HEAD['cin']) ? $_HEAD['cin'] : '';
    $nom=isset($_HEAD['nom']) ? $_HEAD['nom'] : '';
    $prenom=isset($_HEAD['prenom']) ? $_HEAD['prenom'] : '';
    $mdp=isset($_HEAD['mdp']) ? $_HEAD['mdp'] : '';
    $email=isset($_HEAD['email']) ? $_HEAD['email'] : '';
    $numtel=isset($_HEAD['numtel']) ? $_HEAD['numtel'] : '';
    if((!empty($nom)) && (!empty($prenom)) && (!empty($cin)) && (!empty($mdp)) && (!empty($email)) && (!empty($numtel))){
        $stat1=$c->prepare("INSERT INTO agriculteurs (Cin,Nom,Prènom,MotDePasse,Email,NumTel) VALUES ('$cin','$nom','$prenom','$mdp','$email','$numtel')");
        if($stat1->execute()){
            echo "Inscription réussie";
        }
        else{
            echo "Inscription échouée,veuillez réessayer";
        }
        $d=deconnexionBD();
    }
    else{
        echo "les champs sont obligatoires!!";
    }
}
else{
    echo "non valide";
}
$d=deconnexionBD();
?>