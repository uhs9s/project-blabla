<?php
require 'database.php';
require 'header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<h1 class="mb-4">Dashboard</h1>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Welkom, <?php echo htmlspecialchars($_SESSION['username']); ?></h5>
                <p class="card-text">Jouw rol: <?php echo htmlspecialchars($_SESSION['role']); ?></p>
            </div>
        </div>
    </div>
</div>

<?php if ($_SESSION['role'] == 'admin'): ?>
    <div class="row mt-4">
        <div class="col-12">
            <h2>Beheer</h2>
            <div class="d-grid gap-2 d-md-block">
                <a href="add_product.php" class="btn btn-success me-md-2">Product toevoegen</a>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php require 'footer.php'; ?>