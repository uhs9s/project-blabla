<?php
require 'database.php';
require 'header.php';

if(!isset($_GET['id'])) { 
    echo "Product niet gevonden"; 
    require 'footer.php';
    exit; 
}

$id = (int)$_GET['id'];
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if(!$product){ 
    echo "Product niet gevonden"; 
    require 'footer.php';
    exit; 
}
?>

<h1><?= htmlspecialchars($product['name']) ?></h1>
<img src="<?= htmlspecialchars($product['image']) ?>" class="img-fluid mb-3" style="max-height: 300px;">
<p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
<p>Prijs: €<?= number_format($product['price'], 2) ?></p>

<?php require 'footer.php'; ?>