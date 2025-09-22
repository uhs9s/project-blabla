<?php
require 'database.php';
require 'header.php';

$stmt = $conn->query("SELECT * FROM products ORDER BY created_at DESC");
$products = $stmt->fetchAll();
?>

<h1>Producten</h1>
<div class="row">
<?php foreach($products as $product): ?>
  <div class="col-md-4 mb-3">
    <div class="card">
      <img src="<?= htmlspecialchars($product['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>" style="height: 200px; object-fit: cover;">
      <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
        <p class="card-text">€<?= number_format($product['price'], 2) ?></p>
        <a href="product.php?id=<?= $product['id'] ?>" class="btn btn-primary">Bekijk</a>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>

<?php require 'footer.php'; ?>