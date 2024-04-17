<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulation Agricole</title>
    <link rel="stylesheet" href=" {{ asset('css1/stylesjeu.css') }} ">
    <link rel="stylesheet" href=" {{ asset('js/scriptgame.js') }} ">
</head>
<body>
    <div id="farm">
        <h1 class="title">Simulation Agricole</h1>
        <div id="actions">
            <h2 class="title1">Actions</h2>
            <form action="{{route('dashboard')}}" id="espaces">

                <label for="espace">Donner l'espace :</label>
                <input type="number" id="espace" name="espace" placeholder="ton espace en Hectare" min="1">
                <label for="capital">Capital:</label>

                <input type="text" id="capital" name="capital" placeholder="Ton capital en TND">
                <label for="Type">Choisir le type :</label>

                <select id="Type" name="type">
                    <option value="Arbres">Arbres</option>
                    <option value="Cultures">Cultures</option>
                </select>


                <div id="formContainer">
                    <!-- Les formulaires spécifiques pour chaque option seront ajoutés ici -->
                </div>

                <label for="puits">Avez-vous un puits :</label>
                <select id="puits">
                    <option value="oui">oui</option>
                    <option value="non">non</option>
                </select>
                <div id="formpuitsContainer">

                    <!-- Les formulaires spécifiques pour chaque option seront ajoutés ici -->

                </div>

                  <button id="submitBtn" type="submit">Simuler</button>


            </form>
        </div>

         <ul id="resultList"></ul>
    </div>

    <script src="{{ asset('js/scriptgame.js') }}"></script>
</body>
</html>
