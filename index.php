<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = md5($_POST['senha']); 

    $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['logged_in'] = true;
        header("Location: home.php");
        exit;
    } else {
        $error = "Credenciais inválidas.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/tailwind.css">
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center">
    <div class="container bg-white shadow-md rounded-lg p-8 w-full max-w-md">
        <h2 class="text-3xl font-bold text-red-400 mb-6 text-center">Login</h2>
        <?php if (isset($error)): ?>
            <p class="text-red-500 text-center mb-4"><?= $error ?></p>
        <?php endif; ?>
        <form action="index.php" method="POST" class="my-4">
            <div>
                <label for="email" class="block text-gray-700">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Insira seu e-mail" 
                    class="border h-10 border-gray-300 rounded-md w-full p-2 focus:outline-none focus:ring-2 focus:ring-red-400" required>
            </div>
            <div>
                <label for="senha" class="block text-gray-700">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Insira sua senha" 
                    class="border h-10 border-gray-300 rounded-md w-full p-2 focus:outline-none focus:ring-2 focus:ring-red-400" required>
            </div>
            <button style="margin-top:12px;" type="submit" 
                class="bg-red-400 text-white rounded-md w-full py-2 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-300">
                Entrar
            </button>
        </form>
    </div>
</body>
</html>
