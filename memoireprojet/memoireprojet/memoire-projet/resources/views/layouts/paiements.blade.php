<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="./assets/css/argon-design-system.css?v=1.2.2" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/style.css">
    <title>Paiements</title>
   
   <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background-color: #f1f2f6;
            color: #2f3542;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .payment-option {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 15px;
}

.payment-logo {
    width: 80px; /* Même largeur pour toutes les images */
    height: 80px; /* Fixez une hauteur uniforme */
    object-fit: contain; /* Conserve le ratio d'aspect */
    margin-bottom: 10px; /* Espace entre l'image et le texte */
}

.payment-option p {
    font-size: 1rem;
    font-weight: bold;
    text-align: center;
    margin: 0;
}


        header {
            background-color: #1e90ff;
            color: white;
            width: 100%;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        header h1 {
            margin: 0;
            font-size: 1.8rem;
        }
        .payment-form {
            background: white;
            padding: 30px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .payment-form form {
            display: flex;
            flex-direction: column;
        }
        .payment-form form div {
            margin-bottom: 15px;
        }
        .payment-form label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        .payment-form input[type="text"],
        .payment-form select {
            padding: 10px;
            border: 1px solid #ced6e0;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }
        .payment-form button {
            background-color:rgb(4, 80, 86);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.2s ease;
            margin-top: 10px;
        }
        .payment-form button:hover {
            background-color:rgb(6, 115, 122);
        }

        /* Style pour la fenêtre modale */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .payment-option-btn {
            padding: 10px;
            background-color: #1e90ff;
            color: white;
            border: none;
            border-radius: 5px;
            margin: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white position-sticky top-0 shadow py-2">
    <div class="container">
      <a class="navbar-brand" href="#">Dab Materiel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  href="{{ route('produits.index') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acceil</a>
         
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Salon</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Description Salon</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cuisine</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Description Cuisine</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bureau</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Description Bureau</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
    
        </ul>
      </div>
    </div>
  </nav>
    <div class="payment-form">
        <form id="payment-form" method="POST" action="{{ route('processPaiement') }}">
            @csrf
            <div>
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div>
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>

            <div>
                <label for="adresse">Adresse:</label>
                <input type="text" id="adresse" name="adresse" required>
            </div>
            <div>
            <label for="total">Montant total: {{ $total }} F</label>
            <input type="hidden" name="total" value="{{ $total }}">
        </div>

            <button type="button" id="pay-button">Payer</button>
        </form>
    </div>

    <!-- Fenêtre modale pour le choix de paiement -->
    <div id="payment-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Choisissez votre méthode de paiement</h2>
        <button class="payment-option-btn" id="wave-btn">
            <div class="payment-option">
                <img src="assets/img/brand/wave.png" alt="Wave Logo" class="payment-logo">
                <p>Wave</p>
            </div>
        </button>
        <button class="payment-option-btn" id="orange-btn">
            <div class="payment-option">
                <img src="assets/img/brand/orangemoney.png" alt="Orange Money Logo" class="payment-logo">
                <p>Orange Money</p>
            </div>
        </button>
       <button class="payment-option-btn" id="orange-btn">
            <div class="payment-option">
            <img src="assets/img/brand/cartebancaire.jpeg"alt="Carte Bancaire" class="payment-logo">
            <p>carte Bancaire    </p>
            </div>
        </button>

    </div>
</div>


    <script>
        // Ouvrir la fenêtre modale au clic sur "Payer"
        const payButton = document.getElementById('pay-button');
        const modal = document.getElementById('payment-modal');
        const closeBtn = document.querySelector('.close');
        
        payButton.addEventListener('click', function() {
            modal.style.display = "block";
        });

        // Fermer la fenêtre modale
        closeBtn.addEventListener('click', function() {
            modal.style.display = "none";
        });

        // Si l'utilisateur choisit Wave ou Orange Money, soumettre le formulaire
        const waveBtn = document.getElementById('wave-btn');
        const orangeBtn = document.getElementById('orange-btn');

        waveBtn.addEventListener('click', function() {
            document.getElementById('payment-form').action = "{{ route('processPaiement') }}?method=wave";
            document.getElementById('payment-form').submit();
        });

        orangeBtn.addEventListener('click', function() {
            document.getElementById('payment-form').action = "{{ route('processPaiement') }}?method=orange";
            document.getElementById('payment-form').submit();
        });

        // Fermer la fenêtre modale si l'utilisateur clique en dehors
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
