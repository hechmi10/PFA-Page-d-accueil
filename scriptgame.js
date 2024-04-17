document.addEventListener('DOMContentLoaded', function () {
    const selectElement = document.getElementById('Type');
    const formContainer = document.getElementById('formContainer');
    const simulationForm = document.getElementById('espaces');
    const submitBtn = document.getElementById('submitBtn');
    const selectexistance= document.getElementById('puits');
    const formpuits = document.getElementById('formpuits');


    selectElement.addEventListener('change', function () {
        formContainer.innerHTML = '';

        const selectedOption = selectElement.value;

        if (selectedOption === 'Arbres') {
            formContainer.innerHTML = `
                <select id="Arbres">
                    <option value="Olive"> Olivier </option>
                    <option value="Oranger"> Oranger </option>
                    <option value="Amandier"> Amandier </option>
                    <option value="Pistachier"> Pistachier </option>
                </select>
            `;
        } else if (selectedOption === 'Cultures') {
            formContainer.innerHTML = `
                <select id="Cultures">
                    <option value="Blé"> Blé </option>
                    <option value="Tomate"> Tomate </option>
                    <option value="maïs"> maïs </option>
                    <option value="oignons"> oignons </option>
                </select>
            `;
        }

    });
    selectexistance.addEventListener('change', function () {

        const formpuitsContainer = document.getElementById('formpuitsContainer'); // Renommer l'ID

    const selectedOption = selectexistance.value;

    if (selectedOption === 'non') {
        formpuitsContainer.innerHTML = `
            <label for="formpuits">ajouter un puits </label>
            <input type="number" id="formpuits" placeholder="Profondeur du puits" min="1">
        `;

    }
});



    simulationForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const espace = document.getElementById('espace').value;
        const capital = document.getElementById('capital').value;
        const type = document.getElementById('Type').value;


        let details = '';
        let netproduct=0;
        var prix=0;
        var payment=0;
        var perproduct=0;

        if (type === 'Arbres') {
            const arbreSelectionne = document.getElementById('Arbres').value;
            details = getArbreDetails(arbreSelectionne);
            netproduct = getArbreProduct(arbreSelectionne);
            prix= getArbrePrix(arbreSelectionne);
            payment= getPayment(arbreSelectionne);
            perproduct = getArbrePerproduct(arbreSelectionne,getArbreProduct(arbreSelectionne))
        } else if (type === 'Cultures') {
            const cultureSelectionnee = document.getElementById('Cultures').value;
            details = getCultureDetails(cultureSelectionnee);
            netproduct = getCultureProduct(cultureSelectionnee);
            prix= getCulturePrix(cultureSelectionnee);
            payment= getculturePayment(cultureSelectionnee);

        }




        localStorage.setItem('simulationResults', JSON.stringify({
            espace: espace,
            capital: capital,
            type: type,
            details: details,
            netproduct: netproduct,
            prix :prix,
            payment : payment,
            perproduct : perproduct
        }));


        // Rediriger vers la page du tableau de bord
        window.location.href = "dashboard";

    });

});
function getPayment(arbre){
    var payment;
    selectexistance= document.getElementById('puits');
    formpuits = document.getElementById('formpuits');
    switch (arbre){
        case 'Olive':
            if(selectexistance.value==='non'){
                payment=(100+500+2000)*3 + formpuits.value *400 +42000;
            }else {
                payment=(100+500+2000)*3;
            }
            break;

        case 'Oranger':
            if(selectexistance.value==='non'){
                payment=(100+500+2000)*5 + formpuits.value*400 +42000;
            }else {
                payment=(100+500+2000)*5;
            }

            break;
        case 'Amandier'  :
            if(selectexistance.value==='non'){
                payment=(100+500+2000)*5 + formpuits.value*400 +42000;
            }else {
                payment=(100+500+2000)*5 ;
            }

            break;
        case 'Pistachier' :
            if(selectexistance.value==='non'){
                payment=(100+500+2000)*11 + formpuits.value*400 + 42000;
            }else {
                payment=(100+500+2000)*11;
            }

            break;
        default:
            return "Aucun détail disponible pour cette culture";
    }

    return payment;

}
function getculturePayment(culture){
    var payment;
    selectexistance= document.getElementById('puits');
    formpuits = document.getElementById('formpuits');
    switch (culture){
        case 'Blé':
            if(selectexistance.value==='non'){
                payment=(100+2000) + formpuits.value *400 +42000;
            }else {
                payment=(100+2000);
            }
            break;

        case 'Tomate':
            if(selectexistance.value==='non'){
                payment=(100+2000) + formpuits.value*400 +42000;
            }else {
                payment=(100+2000);
            }

            break;
        case 'maïs'  :
            if(selectexistance.value==='non'){
                payment=(100+2000) + formpuits.value*400 +42000;
            }else {
                payment=(100+2000) ;
            }

            break;
        case 'oignons' :
            if(selectexistance.value==='non'){
                payment=(100+2000) + formpuits.value*400 + 42000;
            }else {
                payment=(100+2000);
            }

            break;
        default:
            return "Aucun détail disponible pour cette culture";
    }

    return payment;

}
function getArbrePrix(arbre) {
    var prix;

    switch (arbre){
        case 'Olive':
            prix = 3.5;

            break;
        case 'Oranger':
            prix = 3;

            break;
        case 'Amandier'  :
            prix = 8;

            break;
        case 'Pistachier' :
            prix = 20;

            break;
        default:
            return "Aucun détail disponible pour cette culture";
    }

    return prix;

}
function getCulturePrix(culture) {
    var prix;

    switch (culture){
        case 'Blé':
            prix = 0.9;

            break;
        case 'Tomate':
            prix =2;

            break;
        case 'maïs'  :
            prix = 3;

            break;
        case 'oignons' :
            prix = 2,5;

            break;
        default:
            return "Aucun détail disponible pour cette culture";
    }

    return prix;

}

function getArbreProduct(arbre) {
    var product;
    var nbarbre;
    var netproduct;

    switch (arbre){
        case 'Olive':

            product = 75 ;
            nbarbre = 272;

            break;
        case 'Oranger':
            product = 65;
            nbarbre = 400;
            break;
        case 'Amandier'  :
            product = 25 ;
            nbarbre = 300 ;
            break;
        case 'Pistachier' :
            product = 37;
            nbarbre = 272;

            break;
        default:
            return "Aucun détail disponible pour cette culture";
    }
    netproduct = product * nbarbre;
    return netproduct;

}
function getCultureProduct(culture) {

    var netproduct;

    switch (culture){
        case 'Blé':

             netproduct = 4000 ;

            break;
        case 'Tomate':
             netproduct = 60000;

            break;
        case 'maïs'  :
            netproduct = 3500 ;

            break;
        case 'oignons' :
            netproduct = 30000;

            break;
        default:
            return "Aucun détail disponible pour cette culture";
    }

    return netproduct;

}
function getArbrePerproduct(arbre,netproduct) {
    var perproduct;

    switch (arbre){
        case 'Olive':
            perproduct = [0.1*netproduct,
                0.3*netproduct,
                0.6*netproduct,
                0.6*netproduct,
                0.85*netproduct,
                0.85*netproduct,
                0.85*netproduct,
                0.85*netproduct,
                0.85*netproduct,
                0.85*netproduct,
                0.95*netproduct,
                0.95*netproduct,
                0.95*netproduct
             ];

            break;
        case 'Oranger':
            perproduct = [0.1*netproduct,
                0.1*netproduct,
                0.3*netproduct,
                0.3*netproduct,
                0.85*netproduct,
                0.85*netproduct,
                0.85*netproduct,
                0.85*netproduct,
                0.85*netproduct,
                0.85*netproduct,
                0.95*netproduct,
                0.95*netproduct,
                0.95*netproduct
             ];

            break;
        case 'Amandier'  :
            perproduct = [0.1*netproduct,
                0.1*netproduct,
                0.3*netproduct,
                0.3*netproduct,
                0.85*netproduct,
                0.85*netproduct,
                0.85*netproduct,
                0.85*netproduct,
                0.85*netproduct,
                0.85*netproduct,
                0.95*netproduct,
                0.95*netproduct,
                0.95*netproduct
             ];

            break;
        case 'Pistachier' :
            perproduct = [0.1*netproduct,
                0.1*netproduct,
                0.1*netproduct,
                0.1*netproduct,
                0.1*netproduct,
                0.45*netproduct,
                0.45*netproduct,
                0.45*netproduct,
                0.45*netproduct,
                0.45*netproduct,
                0.45*netproduct,
                0.95*netproduct,
                0.95*netproduct
             ];

            break;
        default:
            return "Aucun détail disponible pour cette culture";
    }

    return perproduct;

}

function getArbreDetails(arbre) {
    let details = '';
    switch (arbre) {
        case 'Olive':
            details = `
            <table>
            <tr>
              <th>Aspect</th>
              <th>Informations</th>
            </tr>
            <tr>
              <td>Plantation</td>
              <td>
                <ul>
                  <li>Climat méditerranéen avec étés chauds et secs</li>
                  <li>Sol bien drainé, pH entre 5,5 et 8,5</li>
                  <li>Plantation à l'automne ou au printemps</li>
                  <li>Distance de plantation : 5 mètres entre les arbres</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td>Temps de croissance</td>
              <td>
                <ul>
                  <li>Commence à produire des fruits après 3 à 5 ans</li>
                  <li>Pleine production entre 8 et 12 ans après la plantation</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td>Types d'olives</td>
              <td>
                <ul>
                  <li>Arbequina</li>
                  <li>Picual</li>
                  <li>Hojiblanca</li>
                  <li>Frantoio</li>
                  <li>Kalamata</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td>Rendement</td>
              <td>Entre 20 et 200 kg d'olives par an en moyenne</td>
            </tr>
            <tr>
              <td>Récolte</td>
              <td>
                <ul>
                  <li>Automne ou début d'hiver</li>
                  <li>Méthodes de récolte : manuelle (secouage, peignage) ou mécanique</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td>Utilisations</td>
              <td>
                <ul>
                  <li>Production d'huile d'olive</li>
                  <li>Consommation comme olives de table</li>
                </ul>
              </td>
            </tr>
          </table>
            `;
            break;
        case 'Oranger':
            details = `
            <table>
            <tr>
                <th>Aspect</th>
                <th>Informations</th>
            </tr>
            <tr>
                <td>Plantation</td>
                <td>
                    <ul>
                        <li>Climat méditerranéen avec étés chauds et secs</li>
                        <li>Sol bien drainé, pH entre 5,5 et 7,0</li>
                        <li>Plantation au printemps</li>
                        <li>Distance de plantation : 5 mètres entre les arbres</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Temps de croissance</td>
                <td>
                    <ul>
                        <li>Commence à produire des fruits après 2 à 3 ans</li>
                        <li>Pleine production entre 5 et 10 ans après la plantation</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Types d'oranges</td>
                <td>
                    <ul>
                        <li>Navel</li>
                        <li>Valencia</li>
                        <li>Blood orange (Orange sanguine)</li>
                        <li>Washington</li>
                        <li>Cara Cara</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Rendement</td>
                <td>Entre 100 et 300 kg d'oranges par arbre et par an en moyenne</td>
            </tr>
            <tr>
                <td>Récolte</td>
                <td>
                    <ul>
                        <li>En automne et en hiver</li>
                        <li>Récolte manuelle</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Utilisations</td>
                <td>
                    <ul>
                        <li>Consommation de fruits frais</li>
                        <li>Transformation en jus d'orange</li>
                        <li>Utilisation dans la cuisine</li>
                    </ul>
                </td>
            </tr>
        </table>
            `;
            break;
        case 'Amandier':
            details = `
            <table>
            <tr>
              <th>Aspect</th>
              <th>Informations</th>
            </tr>
            <tr>
              <td>Plantation</td>
              <td>
                <ul>
                  <li>Climat méditerranéen</li>
                  <li>Sol bien drainé</li>
                  <li>La plantation de jeunes amandiers dans le champ peut s'effectuer pendant l'hiver (avant la floraison)</li>
                  <li>Les distances typiques sont de 5,5 par 5,5 mètres donnera 330 arbres par hectare </li>
                  <li> Les fosses ont habituellement une dimension de 45 par 45cm et une profondeur de 60cm </li>
                  <li> l'amandier est propagé par des greffes en T sur des arbrisseaux ou des clones âgés de 1-2 ans. La greffe en T peut s'effectuer à partir du début du printemps jusqu'à l'automne, mais la plupart des cultivateurs s'en occupent pendant l'été.</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td>Temps de croissance</td>
              <td>
                <ul>
                  <li>Commence à produire des amandes après 3 à 5 ans</li>
                  <li>Pleine production entre 4 et 6 ans après la plantation</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td>Comment irriguer </td>
              <td>
                <ul>
                  <li>a fréquence d'arrosage s'étale de une fois tous les deux jours à une fois tous les quatre jours</li>
                  <li>il est possible que vous deviez augmenter l'apport d'eau de 30%, en particulier au début du printemps</li>
                  <li>des cultivateurs arrêtent d'arroser les arbres environ 3-4 jours avant de commencer la récolte</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td>Types d'amandes</td>
              <td>
                <ul>
                  <li>Doux</li>
                  <li>Amères</li>
                  <li>Amandes à coque tendre</li>
                  <li>Amandes à coque dure</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td>Rendement</td>
              <td>Entre 20 et 200 kg d'amandes par arbre et par an en moyenne</td>
            </tr>
            <tr>
              <td>Récolte</td>
              <td>
                <ul>
                  <li>Automne</li>
                  <li>Récolte manuelle ou mécanique</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td>Utilisations</td>
              <td>
                <ul>
                  <li>Consommation directe</li>
                  <li>Production d'huile d'amande</li>
                  <li>Utilisation dans la pâtisserie et la confiserie</li>
                </ul>
              </td>
            </tr>
          </table>
            `;
            break;
        case 'Pistachier':
            details = `
            <table border="1">
    <tr>
        <th>Aspect</th>
        <th>Informations</th>
    </tr>
    <tr>
        <td>Plantation</td>
        <td>
            <ul>
                <li>Climat méditerranéen</li>
                <li>Sol bien drainé</li>
                <li>Plantation à l'automne ou au printemps</li>
                <li>Des distances de 6 par 6 mètres donnera 272 arbres par hectare</li>
                <li> Dans les grands vergers de pistaches avec 600 arbres ou plus, les cultivateurs placent souvent 1 arbre mâle pour 21 arbres femelles </li>
            </ul>
        </td>
    </tr>
    <tr>
        <td>Temps de croissance</td>
        <td>
            <ul>
                <li>Le pistachier bourgeonnant moyen fructifie à la 4ème ou 5ème année environ de sa vie</li>
                <li>Pleine production atteinte après 12-14 ans </li>
            </ul>
        </td>
    </tr>

</table>
            `;
            break;
        default:
            details = "Aucun détail disponible pour cet arbre";
    }
    return details;
}

function getCultureDetails(culture) {
    let details = '';
    switch (culture) {
        case 'Blé':
            details = `<table border="1">
            <tr>
                <th>Aspect</th>
                <th>Informations</th>
            </tr>
            <tr>
                <td>Plantation</td>
                <td>
                    <ul>
                        <li>Préfère les climats tempérés</li>
                        <li>Peut être cultivé dans une variété de sols, mais préfère les sols bien drainés et riches en nutriments</li>
                        <li>Plantation à l'automne ou au début du printemps, selon la variété et la zone de culture</li>
                        <li>Profondeur de semis : environ 2 à 3 cm</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Temps de croissance</td>
                <td>
                    <ul>
                        <li>Germination : 7 à 10 jours après le semis</li>
                        <li>Développement végétatif : environ 6 à 8 semaines</li>
                        <li>Floraison : environ 9 à 11 semaines après le semis</li>
                        <li>Maturité : environ 3 à 4 mois après le semis</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Rendement</td>
                <td>
                    <ul>
                        <li>Varie en fonction de la variété, des conditions de croissance et des pratiques agricoles</li>
                        <li>Rendements moyens peuvent aller de 2 à 8 tonnes par hectare</li>
                    </ul>
                </td>
            </tr>
            <!-- Ajoutez d'autres lignes pour plus d'informations si nécessaire -->
        </table>"`;
            break;
        case 'Tomate':
            details = `
            <table border="1">
            <tr>
                <th>Aspect</th>
                <th>Informations</th>
            </tr>
            <tr>
                <td>Plantation</td>
                <td>
                    <ul>
                        <li>Plante annuelle originaire d'Amérique du Sud</li>
                        <li>Préfère les climats chauds et ensoleillés</li>
                        <li>Peut être cultivée en pleine terre ou en pots</li>
                        <li>Plantation au printemps après les dernières gelées</li>
                        <li>Besoin de sol riche en matière organique et bien drainé</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Temps de croissance</td>
                <td>
                    <ul>
                        <li>Germination : 5 à 10 jours après le semis</li>
                        <li>Développement végétatif : environ 2 à 3 mois</li>
                        <li>Floraison : 6 à 8 semaines après le semis</li>
                        <li>Maturité : 60 à 90 jours après la floraison</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Rendement</td>
                <td>
                    <ul>
                        <li>Varie en fonction de la variété, des conditions de croissance et des pratiques culturales</li>
                        <li>Peut produire plusieurs kilogrammes de fruits par plante</li>
                    </ul>
                </td>
            </tr>
            <!-- Ajoutez d'autres lignes pour plus d'informations si nécessaire -->
        </table>
        `;
            break;
        case 'maïs':
            details = `<table border="1">
            <tr>
                <th>Aspect</th>
                <th>Informations</th>
            </tr>
            <tr>
                <td>Plantation</td>
                <td>
                    <ul>
                        <li>Plante annuelle originaire d'Amérique centrale</li>
                        <li>Préfère les climats chauds avec une température moyenne de 21 à 27°C</li>
                        <li>Plantation au printemps après les dernières gelées</li>
                        <li>Besoin de sols bien drainés et riches en matière organique</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Temps de croissance</td>
                <td>
                    <ul>
                        <li>Germination : 7 à 10 jours après le semis</li>
                        <li>Développement végétatif : environ 2 à 3 mois</li>
                        <li>Floraison : environ 60 à 70 jours après le semis</li>
                        <li>Maturité : 2 à 4 mois après la floraison</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Rendement</td>
                <td>
                    <ul>
                        <li>Varie en fonction de la variété, des conditions de croissance et des pratiques agricoles</li>
                        <li>Rendements moyens peuvent aller de 4 à 10 tonnes par hectare</li>
                    </ul>
                </td>
            </tr>
            <!-- Ajoutez d'autres lignes pour plus d'informations si nécessaire -->
        </table>`;
            break;
        case 'oignons':
            details = `<table border="1">
            <tr>
                <th>Aspect</th>
                <th>Informations</th>
            </tr>
            <tr>
                <td>Plantation</td>
                <td>
                    <ul>
                        <li>Plante bisannuelle originaire d'Asie centrale</li>
                        <li>Peut être cultivé dans une variété de climats, mais préfère les climats tempérés à chauds</li>
                        <li>Plantation au printemps pour une récolte en été, ou à l'automne pour une récolte l'année suivante</li>
                        <li>Besoin de sols bien drainés et riches en matière organique</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Temps de croissance</td>
                <td>
                    <ul>
                        <li>Germination : 7 à 14 jours après le semis</li>
                        <li>Développement végétatif : environ 3 à 5 mois</li>
                        <li>Formation du bulbe : environ 2 à 3 mois après le semis</li>
                        <li>Récolte : généralement 4 à 5 mois après le semis</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Rendement</td>
                <td>
                    <ul>
                        <li>Varie en fonction de la variété, des conditions de croissance et des pratiques culturales</li>
                        <li>Rendements moyens peuvent aller de 10 à 20 tonnes par hectare</li>
                    </ul>
                </td>
            </tr>
            <!-- Ajoutez d'autres lignes pour plus d'informations si nécessaire -->
        </table>`;
            break;
        default:
            details = "Aucun détail disponible pour cette culture";
    }
    return details;
}
