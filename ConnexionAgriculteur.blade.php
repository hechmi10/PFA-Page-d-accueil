<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion Agriculteur</title>
</head>
<style>
body {
  background: #E3F2FD;
  background-image:url("https://cdn.pixabay.com/photo/2014/09/09/19/07/corn-field-440338_640.jpg");
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
    background-color: greenyellow;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
    font-size: 25px;
}
input[type="password"],input[type="email"]{
    height:fit-content;
    width: fit-content;
    border-radius: 50px;
    background-color: greenyellow;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
    font-size: 25px;
}
input[type="submit"]{
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
  <form action="ConnexionAgriculteurbackend.blade.php" method="post">
    <div class="wrapper">
      <fieldset>
        <center><h1>Connexion d'un Agriculteur</h1></center>
        <label>Email:</label><br>
        <input type="email" name="email" placeholder="Email" id="email" required><br>
        <label>Mot de passe:</label><br>
        <input type="password" name="mdp" placeholder="Mot de passe" id="mdp" required><br>
        <input type="submit" name="connecter" value="Se connecter">
      </fieldset>
    </div>
</form>
</body>
</html>
