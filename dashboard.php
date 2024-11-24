<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
    exit;
}
include 'includes/header.php';
?>

<div class="dashboard">
    <h1>Bem-vindo ao Sistema de Academia</h1>
    <p>Escolha uma opção no menu acima.</p>
</div>

<?php include 'includes/footer.php'; ?>
