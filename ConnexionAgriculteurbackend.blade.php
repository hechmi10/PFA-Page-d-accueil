<?php
require("Page d'acceuil PFA connexion BD.blade.php");
if(isset($_POST['connecter'])){
    $email=isset($_POST['email']) ? $_POST['email'] : '';
    $mdp=isset($_POST['mdp']) ? $_POST['mdp'] : '';
    if((!empty($email)) && (!empty($mdp))){
        $c=connexionBD();
        $stat2=$c->query("SELECT * FROM agriculteurs;");
        if($stat2->execute()){
            while($r=$stat2->fetch(PDO::FETCH_NUM)){
                foreach($r as $v){
                    echo "$v"."<br>";
                }
            }
            $d=deconnexionBD();
        }
        else{
            echo "Connexion échouée,veuillez réessayer";
        }
    }
}
else{
    echo "non valide";
}
?>