<?php
require("Page d'acceuil PFA connexion BD.blade.php");
$c = connexionBD();
if(isset($_POST['email'], $_POST['mdp'])){
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : '';
    if(!empty($email) && !empty($mdp)){
        $stat2 = $c->prepare("SELECT * FROM agriculteurs WHERE Email = :email AND MotDePasse = :mdp");
        $stat2->execute(array('email' => $email, 'mdp' => $mdp));
        $result = $stat2->fetchAll(PDO::FETCH_ASSOC);

        if($result){
            foreach($result as $row){
                foreach($row as $key => $value){
                    echo "$key: $value <br>";
                }
            }
        } else {
            echo "Aucun agriculteur trouvé avec ces identifiants.";
        }
    }
}
else{
    echo "Des données sont manquantes.";
}
$d = deconnexionBD();
?>
