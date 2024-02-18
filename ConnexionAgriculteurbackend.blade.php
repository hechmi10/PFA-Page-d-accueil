<?php
require("Page d'acceuil PFA Connexion BD.blade.php");
$c=connexionBD();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['email'], $_POST['mdp']) && !empty($_POST['email']) && !empty($_POST['mdp'])){
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
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
