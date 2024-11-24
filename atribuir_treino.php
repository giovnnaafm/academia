<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aluno_id = $_POST['aluno_id'];
    $treino_id = $_POST['treino_id'];

    $sql = "INSERT INTO treinos_alunos (aluno_id, treino_id) VALUES ($aluno_id, $treino_id)";
    $conn->query($sql);
}
?>

<div class="container">
    <h2>Atribuir Treino a Aluno</h2>
    <form method="POST" action="atribuir_treino.php">
        <select name="aluno_id" required>
            <option value="">Selecione um Aluno</option>
            <?php
            $result = $conn->query("SELECT id, nome FROM alunos");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
            }
            ?>
        </select>
        <select name="treino_id" required>
            <option value="">Selecione um Treino</option>
            <?php
            $result = $conn->query("SELECT id, nome FROM treinos");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
            }
            ?>
        </select>
        <button type="submit">Atribuir Treino</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
