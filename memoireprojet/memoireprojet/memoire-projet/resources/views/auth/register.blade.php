<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Inscription Admin - Dab Materiel Electro Menager</title>
  <link href="{{ asset('assets/css/argon-design-system.css?v=1.2.2') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="index-page">
  <div class="container mt-5">
    <h2>Inscription Administrateur</h2>
    <form method="POST" action="{{ route('auth.register') }}">
  @csrf
  <div class="form-group">
    <label for="prenom">Prenom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" required autofocus>
  </div>
  <div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom" required>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label for="motdepasse">Mot de passe</label>
    <input type="password" class="form-control" id="motdepasse" name="motdepasse" required>
  </div>
  <div class="form-group">
    <label for="adresse">Adresse</label>
    <input type="text" class="form-control" id="adresse" name="adresse">
  </div>
  <div class="form-group">
    <label for="telephone">Téléphone</label>
    <input type="text" class="form-control" id="telephone" name="telephone">
  </div>
  <button type="submit" class="btn btn-primary">Créer un utilisateur</button>
  <a href="{{ route('master') }}" class="btn btn-danger btn-spacing">Retour</a>

</form>


  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<style>
  .container {
    max-width: 500px;
    margin-top: 50px;
  }

  .btn-primary {
    font-size: 16px;
    padding: 10px 25px;
  }

  h2 {
    margin-bottom: 30px;
  }

  .form-group {
    margin-bottom: 15px;
  }

  .form-control {
    font-size: 16px;
  }
</style>
</html>
