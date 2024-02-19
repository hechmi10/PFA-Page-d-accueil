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
input[type="password"],input[type="email"]{
    height:fit-content;
    width: fit-content;
    border-radius: 50px;
    background-color: yellow;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
    font-size: 25px;
}
button[type="submit"]{
  background-color:white;
  height:1cm;
  width:5cm;
  border-radius:20%;
}
fieldset{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border-radius:10%;
  height: fit-content;
  width:max-content;
  background-color: green;
  border-color: greenyellow;
}
</style>
<body>
    <form action="inscriptionAgriculteurbackend.blade.php" method="post">
        <div class="wrapper">
            <fieldset>
                <center><h1>Inscription d'un agriculteur</h1></center>
                <label>Cin:</label><br>
                <input type="text" name="cin" placeholder="CIN"><br>
                <label>Nom:</label><br>
                <input type="text" name="nom" placeholder="Nom"><br>
                <label>Prènom:</label><br>
                <input type="text" name="prenom" placeholder="Prénom"><br>
                <label>Mot de passe:</label><br>
                <input type="password" name="mdp" placeholder="Mot de passe"><br>
                <label>Email:</label><br>
                <input type="email" name="email" placeholder="Email"><br>
                <label>Numéro de téléphone:</label><br>
                <input type="text" name="numtel" placeholder="Numéro de téléphone"><br>
                <center><button type="submit">S'inscrire</button></center>
            </fieldset>
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
