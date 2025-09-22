<?php
require 'database.php';
require 'header.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin'){
    echo "Je moet admin zijn om dit te doen"; 
    require 'footer.php';
    exit;
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $stmt = $conn->prepare("INSERT INTO products (name,description,price,image) VALUES (?,?,?,?)");
    $stmt->execute([
        trim($_POST['name']),
        trim($_POST['description']),
        trim($_POST['price']),
        trim($_POST['image'])
    ]);
    echo "<div class='alert alert-success'>Product toegevoegd!</div>";
}
?>

<h1>Nieuw Product</h1>
<form method="post">
    <div class="mb-3">
        <label>Naam</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Beschrijving</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>Prijs</label>
        <input type="number" step="0.01" name="price" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Afbeelding URL</label>
        <input type="text" name="image" class="form-control" required>
    </div>
    <button class="btn btn-success">Toevoegen</button>
</form>

<?php require 'footer.php'; ?>