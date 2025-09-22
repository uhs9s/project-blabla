<?php
session_start();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<title>Webshop</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
// Bepaal of dit de inlogpagina is
$is_login_page = basename($_SERVER['PHP_SELF']) === 'login.php';
$is_register_page = basename($_SERVER['PHP_SELF']) === 'register.php';

// Toon navigatiebalk alleen als het NIET de inlog- of registratiepagina is
if (!$is_login_page && !$is_register_page): ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Webshop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <?php if(isset($_SESSION['user_id']) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
          <li class="nav-item"><a class="nav-link" href="add_product.php">Product Toevoegen</a></li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav ms-auto">
        <?php if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])): ?>
            <li class="nav-item">
              <span class="navbar-text me-2">
                Ingelogd als <strong><?= htmlspecialchars($_SESSION['role'] === 'admin' ? 'Admin' : 'Gebruiker') ?></strong>
              </span>
            </li>
            <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Uitloggen</a></li>
        <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="login.php">Inloggen</a></li>
            <li class="nav-item"><a class="nav-link" href="register.php">Registreren</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<?php endif; ?>

<div class="container">