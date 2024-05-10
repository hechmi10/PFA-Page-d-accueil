<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="{{ asset('css2/dash.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header class="header">
        <h1 class="title">Résultats de la Simulation</h1> <!-- Ajout de la classe "title" -->

    </header>
    <section class="sidebar">
        <nav>
            <ul>
            <li>
                    <a href="#" class="logo">
                        <img src="{{asset('images/logo/logoapp.png')}}" alt="#">
                        <span class="nav-item">Fallaha Connect</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('home')}}">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('Profile')}}">
                        <i class="fas fa-user"></i>
                        <span class="nav-item" >Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-wallet"></i>
                        <span class="nav-item">MarketPlace</span>
                    </a>
                </li>
            </ul>
        </nav>




    </section>

       

    </section>




    <main class="main">
        <div class="card">
            <canvas id="Type" class="chart"></canvas>
        </div>
        <div class="card" >
            <div id="results"></div>


         </div>

         <div class="card" >
            <div id="totalprix" class="number"></div>
            <div class="icon-box">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-name">totalprix</div>

        </div>


            <div class="card" >
        <div id="totalProduct" class="number"></div>
        <div class="icon-box">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="card-name">totalProduct</div>



        </div>


         <div class="card" >
        <div id="netpayment" class="number"></div>
        <div class="icon-box">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-name">netpayment</div>


        </div>

         <div class="card" >
        <div id="gain" class="number"></div>
        <div class="icon-box">
                <i class="fas fa-wallet"></i>
            </div>
            <div class="card-name">gain</div>

        </div>

        <form action="{{ route('enregistrer') }}" method="post">
            @csrf
        
            <!-- Champs de formulaire cachés pour stocker les valeurs -->
            <input type="hidden" name="totalprix" id="hidden-totalprix" value="">
            <input type="hidden" name="totalProduct" id="hidden-totalProduct" value="">
            <input type="hidden" name="netpayment" id="hidden-netpayment" value="">
            <input type="hidden" name="gain" id="hidden-gain" value="">
        
            <!-- Autres champs de formulaire peuvent être ajoutés ici -->
        
            <!-- Bouton de soumission du formulaire -->
            <input type="submit" value="Enregistrer">
        </form>
        





        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Récupération des résultats depuis localStorage
                const simulationResults = JSON.parse(localStorage.getItem('simulationResults'));
                console.log('Simulation Results:', simulationResults);

                const canvas = document.getElementById('Type');
                canvas.width = 200; // Nouvelle largeur
                canvas.height = 100; // Nouvelle hauteur
                // Affichage des résultats
                if (simulationResults) {
                    const resultsDiv = document.getElementById('results');
                    const totalProduct = simulationResults.espace * simulationResults.netproduct;
                    const totalprix = simulationResults.prix * totalProduct;
                    const netpayment = simulationResults.payment * simulationResults.espace;
                    const gain = totalprix - netpayment;
                    resultsDiv.innerHTML = `
                    <ul>
                    <div>
                        <li >Espace: ${simulationResults.espace} Hectares</li>
                        <li >Capital: ${simulationResults.capital} TND</li>
                        <li >Type: ${simulationResults.type}</li>
                        <li >Détails spécifiques: ${simulationResults.details}</li>
                    </div>
                    </ul>




                `;
                    const totalProductDiv = document.getElementById('totalProduct');
                    const totalProductDiv1 = document.getElementById('totalprix');
                    const totalProductDiv2 = document.getElementById('netpayment');
                    const totalProductDiv3 = document.getElementById('gain');
                    totalProductDiv.textContent = `  ${totalProduct} Kg
                                              `;
                    totalProductDiv1.textContent = ` ${totalprix} TND `;
                    totalProductDiv2.textContent = ` ${netpayment} TND `;
                    totalProductDiv3.textContent = ` ${gain} TND `;
                    document.getElementById("hidden-totalprix").value = document.getElementById("totalprix").textContent;
                    document.getElementById("hidden-totalProduct").value = document.getElementById("totalProduct").textContent;
                    document.getElementById("hidden-netpayment").value = document.getElementById("netpayment").textContent;
                    document.getElementById("hidden-gain").value = document.getElementById("gain").textContent;
                    // Initialisation du graphique
                    if (simulationResults.type === 'Arbres') {
                        var ctx = document.getElementById('Type').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ['1 an', '2 ans', '3 ans', '4 ans', '5 ans', '6 ans', '7 ans', '8 ans',
                                    '9 ans', '10 ans', '11 ans', '12 ans', '13 ans'
                                ],
                                datasets: [{
                                    label: 'Production par hectare (en kg)',
                                    data: simulationResults.perproduct,
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    }
                } else {
                    document.getElementById('results').textContent = "Aucun résultat de simulation trouvé.";
                }
            });
        </script>

    </main>




    <script src="{{ asset('js/scriptgame.js') }}"></script>
</body>

</html>
