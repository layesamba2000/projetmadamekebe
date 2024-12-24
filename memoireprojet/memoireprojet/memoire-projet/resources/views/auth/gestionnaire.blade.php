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
      <button class="navbar-toggler" type="button" data-
      toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        
            <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gerer les produits</a>
      
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Salon</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Gerer les commandes                 </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cuisine</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#"> metre a jour Stock</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bureau</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Deconnecter</a>
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
   
</body>
</html>
