<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>inscription Agriculteur</title>
</head>
<style>
body {
background: #E3F2FD;
background-image:url("https://cdn.pixabay.com/photo/2016/11/30/15/00/apples-1872997_640.jpg");
background-repeat: no-repeat;
background-size: cover;
}
.wrapper{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border-radius:10%;
  height: fit-content;
  width:max-content;
  background-color: green;
  background-position: center;
  font-size: medium;
  font-family: 'Segoe UI', Tahoma, 'Geneva', Verdana, sans-serif;
  font-style: normal;
}
input[type="text"]{
    height:fit-content;
    width: fit-content;
    border-radius: 50px;
    background-color: yellow;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
    font-size: 25px;
}
input[type="password"]{
    height:fit-content;
    width: fit-content;
    border-radius: 50px;
    background-color: yellow;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
    font-size: 25px;
}
input[type="submit"]{
  background-color:white;
  height:1cm;
  width:5cm;
  border-radius:20%;
}
</style>
<body>
    <?php
    include("Page d'acceuil PFA+inscription+connexion.blade.php");
    ?>
    <form action="Page d'acceuil PFA+inscription+connexion.blade.php" enctype="text/plain" method="POST">
        <div class="wrapper">
         <center><h1>Inscription d'un Agriculteur</h1><center>
         <label>CIN:</label>
         <input type="text" name="cin" placeholder="CIN" id="cin" required><br>
         <label>Nom:</label>
         <input type="text" name="nom" placeholder="Nom" id="nom" required><br>
         <label>Prènom:</label>
         <input type="text" name="prenom" placeholder="Prènom" id="prenom" required><br>
         <label>Mot de passe:</label>
         <input type="password" name="mdp" placeholder="Mot de passe" id="mdp" required><br>
         <label>Email:</label>
         <input type="text" name="email" placeholder="Email" id="email" required><br>
         <input type="submit" name="inscrire" value="S'inscrire"><br>
        </div>
    </form>
</body>
<script>
    var nom="Jaidene";
    var prenom="Hachemi";
    var cin="14035912";
    var password="........";
    var email="hechmi.jaidane@gmail.com";
    if(document.getElementById("nom").value==nom && document.getElementById("prenom").value==prenom && document.getElementById("cin").value==cin && document.getElementById("mdp").value==password && document.getElementById("email").value==email){
        alert("Merci pour votre Service");
    }
</script>
</html>