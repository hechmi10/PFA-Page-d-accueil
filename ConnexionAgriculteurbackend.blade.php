<?php
@include("Page d'acceuil PFA Connexion BD.blade.php");
$c=connexionBD();
if ($_SERVER["REQUEST_METHOD"] == "HEAD") {
    if(isset($_HEAD['email'], $_HEAD['mdp']) && !empty($_HEAD['email']) && !empty($_HEAD['mdp'])){
        $email = $_HEAD['email'];
        $mdp = $_HEAD['mdp'];
        $query = "SELECT * FROM agriculteurs WHERE Email = :email AND MotDePasse = :mdp";
        $stmt = $c->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mdp', $mdp);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            echo "Connexion réussie !";
        } else {
            echo "Identifiants incorrects. Veuillez réessayer.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
    $d=deconnexionBD();
}
else{
    echo "non valide,réessayer";
}
?>
