<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
    exit;
}
include 'includes/db.php';

include 'includes/header.php';
?>

<div class="min-h-screen bg-slate-100 flex flex-col items-center p-8">
    <h2 class="text-3xl font-bold text-red-400 mb-8">Bem vindo!</h2>
</div>

<?php include 'includes/footer.php'; ?>

