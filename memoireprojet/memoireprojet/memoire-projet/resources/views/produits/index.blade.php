<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- CSS Files -->
  <link href="./assets/css/argon-design-system.css?v=1.2.2" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/style.css">
    <title>Boutique en Ligne</title>
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
          <div class="cart-icon" onclick="goToCartPage()">
            <img src="https://cdn-icons-png.flaticon.com/512/1170/1170576.png" alt="Panier">
            <span class="cart-count" id="cart-count">0</span>
        </div>
        </ul>
      </div>
    </div>
  </nav>
    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

    <main class="product-grid" id="product-grid">
        <!-- Les produits seront générés ici par JavaScript -->
    </main>
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

        let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Affiche les produits
const productGrid = document.getElementById('product-grid');
products.forEach(product => {
    const productCard = document.createElement('div');
    productCard.className = 'product-card';
    productCard.innerHTML = `
        <img src="${product.image}" alt="${product.name}">
        <h2>${product.name}</h2>
        <p>${product.price} F</p>
        <button onclick="addToCart(${product.id})">Ajouter au Panier</button>
    `;
    productGrid.appendChild(productCard);
});

// Ajoute un produit au panier
function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    const cartItem = cart.find(item => item.id === productId);

    if (cartItem) {
        cartItem.quantity += 1;
    } else {
        cart.push({ ...product, quantity: 1 });
    }
    saveCart();
    updateCartCount();
}

// Met à jour le compteur du panier
function updateCartCount() {
    const cartCount = document.getElementById('cart-count');
    cartCount.textContent = cart.reduce((total, product) => total + product.quantity, 0);
}

// Sauvegarde le panier dans localStorage
function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Redirige vers la page du panier
function goToCartPage() {
    window.location.href = "cart";
}

updateCartCount();
    </script>
    <style>
  /* Navbar styles */
.navbar {
  background-color: #fff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.navbar-nav .nav-item {
  margin-right: 15px;
}

.navbar-nav .nav-link {
  font-size: 18px;
  color: #333;
}

.navbar-nav .nav-item .dropdown-menu .dropdown-item {
  color: #555;
}

/* Hero Section with Large Image */
.section-hero {
  position: relative;
  height: 80vh; /* Occupy 80% of the viewport height */
  overflow: hidden;
  text-align: center;
}

.hero-image-container {
  position: relative;
  width: 100%;
  height: 100%;
}

.hero-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.hero-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
  font-size: 36px;
  font-weight: bold;
  text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
}

.hero-text h1 {
  margin: 0;
}

/* Button at the bottom of the image */
.hero-image-container a {
  position: absolute;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
}

.btn {
  padding: 12px 30px;
  font-size: 16px;
}

/* Dropdown Menu Styles */
.navbar-nav .nav-item .dropdown-menu {
  min-width: 200px;
  border-radius: 5px;
}

.dropdown-item:hover {
  background-color: #f1f1f1;
}

  </style>
  
</body>
</html>
