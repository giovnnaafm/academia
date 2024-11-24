<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

$aluno_id = $_GET['id'];
$result = $conn->query("SELECT * FROM alunos WHERE id=$aluno_id");
$aluno = $result->fetch_assoc();
?>

<div class="container">
    <h2>Perfil do Aluno: <?php echo $aluno['nome']; ?></h2>
    <p>Idade: <?php echo $aluno['idade']; ?></p>
    <p>Gênero: <?php echo $aluno['genero']; ?></p>
    <p>E-mail: <?php echo $aluno['email']; ?></p>
    <h3>Treinos Atribuídos</h3>
    <ul>
        <?php
        $result = $conn->query("SELECT t.nome FROM treinos_alunos ta JOIN treinos t ON ta.treino_id = t.id WHERE ta.aluno_id=$aluno_id");
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['nome']}</li>";
        }
        ?>
    </ul>
</div>

<?php include 'includes/footer.php'; ?>
