<?php
// Als de gebruiker al is ingelogd, doorsturen naar homepage
session_start();
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    header("Location: index.php");
    exit;
}

require 'database.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username,password,role) VALUES (?,?,'user')");
    try {
        $stmt->execute([$username,$password]);
        echo "<div class='alert alert-success'>Account aangemaakt! <a href='login.php'>Login hier</a></div>";
    } catch(PDOException $e){
        echo "<div class='alert alert-danger'>Gebruikersnaam bestaat al.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<title>Registreren - Webshop</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Registreren</h1>
            
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Gebruikersnaam</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Wachtwoord</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button class="btn btn-success w-100">Registreren</button>
            </form>
            
            <p class="text-center mt-3">
                Al een account? <a href="login.php">Login hier</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>