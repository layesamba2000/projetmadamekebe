<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/css/argon-design-system.css?v=1.2.2" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Panier</title>
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
        .cart-items {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
        .cart-item h2 {
            font-size: 1.2rem;
            margin: 0 20px;
        }
        .cart-item p {
            font-size: 1rem;
            margin: 0 20px;
            color: #888;
        }
        .cart-item input[type="number"] {
            width: 50px;
            padding: 5px;
            margin: 0 20px;
        }
        .cart-item button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        .total {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
            font-size: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .checkout {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
            text-align: right;
        }
        .checkout button {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white position-sticky top-0 shadow py-2">
    <div class="container">
        <a class="navbar-brand" href="#">Dab Materiel</a>
        <div class="cart-icon" onclick="goToCartPage()">
            <img src="https://cdn-icons-png.flaticon.com/512/1170/1170576.png" alt="Panier">
            <span class="cart-count" id="cart-count">0</span>
        </div>
    </div>
</nav>

<div class="cart-items" id="cart-items"></div>

<div class="total">
    <span>Total:</span>
    <span id="total-price">0 F</span>
</div>

<div class="checkout">
    <form id="checkout-form" action="{{ route('layouts.cart') }}" method="POST">
        @csrf
        <input type="hidden" name="total" id="total-input">
        <button type="submit">Passer à la caisse</button>
    </form>
</div>

<script>
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Fonction pour rendre les items du panier
    function renderCartItems() {
        const cartItemsContainer = document.getElementById('cart-items');
        cartItemsContainer.innerHTML = '';

        if (cart.length === 0) {
            cartItemsContainer.innerHTML = '<p>Votre panier est vide.</p>';
        } else {
            cart.forEach(product => {
                const cartItem = document.createElement('div');
                cartItem.className = 'cart-item';
                cartItem.innerHTML = `
                    <img src="${product.image}" alt="${product.name}">
                    <h2>${product.name}</h2>
                    <p>${product.price} F</p>
                    <input type="number" value="${product.quantity}" min="1" onchange="updateQuantity(${product.id}, this.value)">
                    <button onclick="removeFromCart(${product.id})">Supprimer</button>
                `;
                cartItemsContainer.appendChild(cartItem);
            });

            updateTotalPrice();
        }
    }

    // Fonction pour mettre à jour la quantité d'un produit dans le panier
    function updateQuantity(productId, quantity) {
        const product = cart.find(p => p.id === productId);
        if (product) {
            product.quantity = parseInt(quantity);
            saveCart();
            renderCartItems();
            updateCartCount();
        }
    }

    // Fonction pour retirer un produit du panier
    function removeFromCart(productId) {
        cart = cart.filter(product => product.id !== productId);
        saveCart();
        renderCartItems();
        updateCartCount();
    }

    // Fonction pour mettre à jour le prix total
    function updateTotalPrice() {
        const totalPrice = cart.reduce((total, product) => total + product.price * product.quantity, 0);
        document.getElementById('total-price').textContent = `${totalPrice} F`;
        document.getElementById('total-input').value = totalPrice;
    }

    // Fonction pour sauvegarder le panier dans localStorage
    function saveCart() {
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    // Fonction pour mettre à jour le nombre d'articles dans l'icône du panier
    function updateCartCount() {
        document.getElementById('cart-count').textContent = cart.length;
    }

    // Fonction qui simule le succès du paiement
    function processPayment() {
        // Simuler un paiement réussi
        const paymentSuccess = true;

        if (paymentSuccess) {
            // Vider le panier localStorage
            localStorage.removeItem('cart');
            cart = []; // Réinitialiser le tableau local pour le panier
            alert('Votre paiement a été réussi, votre panier a été vidé.');
            document.getElementById('cart-items').innerHTML = '<p>Votre panier est maintenant vide.</p>';
            updateCartCount();
            window.location.href = "/produits"; // Rediriger vers la page d'accueil après paiement
        }
    }

    // Initialisation des éléments de la page
    renderCartItems();
    updateCartCount();
</script>

</body>
</html>
