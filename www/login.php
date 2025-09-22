<?php
// Als de gebruiker al is ingelogd, doorsturen naar homepage
session_start();
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    header("Location: index.php");
    exit;
}

require 'database.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute([trim($_POST['username'])]);
    $user = $stmt->fetch();

    if($user && password_verify(trim($_POST['password']), $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Verkeerde gebruikersnaam of wachtwoord";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<title>Inloggen - Webshop</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Inloggen</h1>
            
            <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
            
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Gebruikersnaam</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Wachtwoord</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button class="btn btn-primary w-100">Inloggen</button>
            </form>
            
            <p class="text-center mt-3">
                Nog geen account? <a href="register.php">Registreer hier</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>