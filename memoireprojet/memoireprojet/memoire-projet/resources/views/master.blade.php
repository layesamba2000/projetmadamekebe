<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique en Ligne</title>
    <link href="./assets/css/argon-design-system.css?v=1.2.2" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        header {
            background-color: #2c3e50;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }
        header h1 {
            margin: 0;
            font-size: 1.8rem;
        }
        .cart-icon {
            position: relative;
            cursor: pointer;
        }
        .cart-icon img {
            width: 40px;
            height: 40px;
        }
        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 5px 10px;
            font-size: 0.9rem;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .product-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-card h2 {
            font-size: 1.2rem;
            margin: 10px 0;
        }
        .product-card p {
            font-size: 1rem;
            color: #888;
        }
        .product-card button {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-bottom: 10px;
        }

        /* Modal Styling */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 10px 20px;
            width: 250px; /* Modal plus compacte et droite */
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.3s ease-out;
        }

        .modal p {
            font-size: 1rem;
            margin-bottom: 10px;
            color: #333;
        }

        .modal button {
            background-color: #3498db;
            color: white;
            padding: 8px 15px;
            border: none;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal button:hover {
            background-color: #2980b9;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white position-sticky top-0 shadow py-2">
    <div class="container">
      <a class="navbar-brand" href="#">Dab Materiel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chambre</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Description Chambre</a>
            </div>
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
          <li class="nav-item">
          <a class="btn btn-primary nav-link" href="{{ route('auth.form') }}">Se connecter</a>
        </li>
        </ul>
      </div>
    </div>
  </nav>

    <!-- Products Grid -->
    <main class="product-grid" id="product-grid"></main>

<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-body">
        <p>Veuillez vous connecter avant d'ajouter un produit au panier.</p>
      </div>
      <div class="modal-footer">
     
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Fermer</button>
      </div>
    </div>
  </div>


    <script>
        const products = [
            { id: 1, name: 'Chaussures de sport', price: 75000, image: 'assets/img/brand/chausure-sport.jpg' },
            { id: 2, name: 'T-shirt en coton', price: 20000, image: 'assets/img/brand/T-shirt_en_coton.jpg' },
            { id: 3, name: 'Clime', price: 150000, image: 'assets/img/brand/clime.jpg' },
            { id: 4, name: 'ensemble', price: 60000, image: 'assets/img/brand/ensemble.jpg' },
            { id: 5, name: 'cable', price: 900000, image: 'assets/img/brand/cable.jpg' },
            { id: 6, name: 'Veste', price: 30000, image: 'assets/img/brand/Veste.jpg' },
            { id: 7, name: 'Baskets pour enfants', price: 50000, image: 'assets/img/brand/enfant.jpg' },
            { id: 8, name: 'Ensemble_enfant', price: 400000, image: 'assets/img/brand/Ensemble_enfant.jpg' },
            { id: 9, name: 'Bracelet en acier inoxydable', price: 250000, image: 'assets/img/brand/bracelet.jpg' },
            { id: 10, name: 'Bracelet_blanche', price: 350000, image: 'assets/img/brand/Bracelet_blanche.jpg' },
            { id: 11, name: 'Chaussures élégantes', price: 1200000, image: 'assets/img/brand/Chaussures_femme.jpg' },
            { id: 12, name: 'Jupe en jean', price: 4500000, image: 'assets/img/brand/jupe.jpg' }
        ];

        const productGrid = document.getElementById('product-grid');
        products.forEach(product => {
            const productCard = document.createElement('div');
            productCard.className = 'product-card';
            productCard.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <h2>${product.name}</h2>
                <p>${product.price} F</p>
                <button onclick="showModal()">Ajouter au Panier</button>
            `;
            productGrid.appendChild(productCard);
        });

        function showModal() {
            document.getElementById('modal').style.display = 'block';
            document.getElementById('modal-overlay').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
            document.getElementById('modal-overlay').style.display = 'none';
        }
    </script>
</body>
</html>
