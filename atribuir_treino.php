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

<div class="min-h-screen bg-slate-100 flex flex-col items-center p-8">
    <h2 class="text-3xl font-bold text-red-400 mb-8">Atribuir Treino a Aluno</h2>
    <form method="POST" action="atribuir_treino.php" class="w-full max-w-4xl grid grid-cols-12 gap-4 bg-white shadow-md rounded-lg p-8">
        <div class="col-span-6 flex flex-col space-y-1">
            <label for="aluno_id" class="text-gray-700">Selecione o aluno:</label>
            <select name="aluno_id" class="border h-10 border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-400" required>
                <option value="">Selecione</option>
                <?php
                $result = $conn->query("SELECT id, nome FROM alunos");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-span-6 flex flex-col space-y-1">
            <label for="treino_id" class="text-gray-700">Selecione o treino:</label>
            <select name="treino_id" class="border h-10 border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-400" required>
                <option value="">Selecione</option>
                <?php
                $result = $conn->query("SELECT id, nome FROM treinos");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="w-full flex justify-end col-span-12">
            <button type="submit" class="bg-red-400 text-white rounded-md px-6 py-2 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-300">Atribuir Treino</button>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
