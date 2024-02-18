<?php
function connexionBD(){
    try{
        $pdo=new PDO('mysql:host=localhost;dbname=agri_connect','root','');
        return $pdo;
    }
    catch(PDOException $e){
        echo "<p>Erreur:" . ($e->getMessage()) . "</p>";
    }
}
function deconnexionBD(){
    $pdo=NULL;
    return $pdo;
}
?>
