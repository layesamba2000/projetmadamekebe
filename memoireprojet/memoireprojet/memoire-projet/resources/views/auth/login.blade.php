<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Connexion Admin - Dab Materiel Electro Menager</title>
  <link href="{{ asset('assets/css/argon-design-system.css?v=1.2.2') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<script>

.btn-spacing {
    margin-right: 15px; /* Ajustez cette valeur selon vos besoins */
}

  </script>
<body >

  <div class="container mt-5">
    <h2>Connexion </h2>
    <form method="POST" action="{{ route('auth.form') }}">
      @csrf
      <div class="form-group">
        <label for="email">Adresse E-mail</label>
        <input type="email" class="form-control" id="email" name="email" required autofocus>
      </div>
      <div class="form-group">
        <label for="motdepasse">Mot de passe</label>
        <input type="password" class="form-control" id="motdepasse" name="motdepasse" required>
      </div>
      <div class="form-group form-check">
      </div>
      <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
    <br>
    <br>
    <br>
    <div class="mt-3">
      <a href="{{ route('auth.formes') }}" class="btn btn-secondary btn-spacing">S'inscrire</a>

      <a href="{{ route('master') }}" class="btn btn-danger btn-spacing">Retour</a>
    </div>
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

  .btn-secondary {
    font-size: 16px;
    padding: 10px 25px;
    margin-top: 10px;
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
