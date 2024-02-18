<?php
function connexionBD(){
    try{
        {{ $pdo }}=new PDO('mysql:host=localhost;dbname=agri_connect','root','');
        return $pdo;
    }
    catch(PDOException $e){
        echo "<p>Erreur:" . ({{ $e }}->getMessage()) . "</p>";
    }
}
function deconnexionBD(){
    {{ $pdo }}=NULL;
    return {{ $pdo }};
}

@if((isset($_POST['cin'])) && (isset($_POST['nom'])) && (isset($_POST['prenom'])) && (isset($_POST['mdp'])) && (isset($_POST['email'])) && (isset($_POST['numtel'])) && (isset($_POST['inscrire']))){
    {{ $cin }}=isset($_POST['cin']) ? $_POST['cin'] : '';
    {{ $nom }}=isset($_POST['nom']) ? $_POST['nom'] : '';
    {{ $prenom }}=isset($_POST['prenom']) ? $_POST['prenom'] : '';
    {{ $mdp }}=isset($_POST['mdp']) ? $_POST['mdp'] : '';
    {{ $email }}=isset($_POST['email']) ? $_POST['email'] : '';
    {{ $numtel }}=isset($_POST['numtel']) ? $_POST['numtel'] : '';
    @if((!empty({{ $nom }})) && (!empty({{ $prenom }})) && (!empty({{ $cin }})) && (!empty({{ $mdp }})) && (!empty({{ $email }})) && (!empty({{ $numtel }}))){
        {{ $c }}=connexionBD();
        {{ $stat1 }}=$c->query("INSERT INTO agriculteurs (Cin,Nom,Prènom,MotDePasse,Email,NumTel) VALUES ('$cin','$nom','$prenom','$mdp','$email','$numtel');");
        @if({{ $stat1 }}->execute()){
            echo "Inscription réussie";
            {{ $d }}=deconnexionBD();
        }
        @else{
            echo "Inscription échouée,veuillez réessayer";
        }
    }
}
@else{
    echo "non valide";
}
@if(isset($_POST['connecter'])){
    {{ $email }}=isset($_POST['email']) ? $_POST['email'] : '';
    {{ $mdp }}=isset($_POST['mdp']) ? $_POST['mdp'] : '';
    @if((!empty({{ $email }})) && (!empty({{ $mdp }}))){
        {{ $c }}=connexionBD();
        {{ $stat2 }}=$c->query("SELECT * FROM agriculteurs;");
        @if({{ $stat2 }}->execute()){
            while({{ $r }}={{ $stat2 }}->fetch(PDO::FETCH_NUM)){
                @foreach({{ $r }} as {{ $v }}){
                    echo "$v"."<br>";
                }
            }
            {{ $d }}=deconnexionBD();
        }
        else{
            echo "Connexion échouée,veuillez réessayer";
        }
    }
}
@else{
    echo "non valide";
}
?>
