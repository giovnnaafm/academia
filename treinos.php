<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $nivel = $_POST['nivel'];
    $duracao = $_POST['duracao'];
    $tipo = $_POST['tipo'];

    $sql = "INSERT INTO treinos (nome, descricao, nivel, duracao, tipo) VALUES ('$nome', '$descricao', '$nivel', $duracao, '$tipo')";
    $conn->query($sql);
}
?>

<div class="container">
    <h2>Cadastro de Treinos</h2>
    <form method="POST" action="treinos.php">
        <input type="text" name="nome" placeholder="Nome do Treino" required>
        <textarea name="descricao" placeholder="Descrição" required></textarea>
        <select name="nivel" required>
            <option value="Iniciante">Iniciante</option>
            <option value="Intermediário">Intermediário</option>
            <option value="Avançado">Avançado</option>
        </select>
        <input type="number" name="duracao" placeholder="Duração (min)" required>
        <select name="tipo" required>
            <option value="Cardio">Cardio</option>
            <option value="Força">Força</option>
            <option value="Flexibilidade">Flexibilidade</option>
        </select>
        <button type="submit">Cadastrar Treino</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
