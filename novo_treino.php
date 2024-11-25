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

<div class="min-h-screen bg-slate-100 flex flex-col items-center p-8">
    <h2 class="text-3xl font-bold text-red-400 mb-8">Cadastro de Treinos</h2>
    <form method="POST" action="novo_treino.php" class="w-full max-w-4xl grid grid-cols-12 gap-4 bg-white shadow-md rounded-lg p-8">
        <div class="col-span-9 flex flex-col space-y-1">
            <label for="nome">Nome do Treino:</label>        
            <input type="text" name="nome" placeholder="Insira o nome do Treino" class="border h-10 border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-400" required>
        </div>    
        <div class="col-span-3 flex flex-col space-y-1">
            <label for="duracao">Duração:</label>                   
            <input type="number" name="duracao" placeholder="XXmin" class="border h-10 border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-400" required>
        </div>
        <div class="col-span-6 flex flex-col space-y-1">
            <label for="nivel">Nível:</label>                   
            <select name="nivel" class="border h-10 border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-400" required>
                <option value="Iniciante">Iniciante</option>
                <option value="Intermediário">Intermediário</option>
                <option value="Avançado">Avançado</option>
            </select>
        </div>
        <div class="col-span-6 flex flex-col space-y-1">
            <label for="tipo">Categoria:</label>                   
            <select name="tipo" class="border h-10 border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-400" required>
                <option value="Cardio">Cardio</option>
                <option value="Força">Força</option>
                <option value="Flexibilidade">Flexibilidade</option>
            </select>
        </div>
        <div class="col-span-12 flex flex-col space-y-1">
            <label for="descricao">Descrição do Treino:</label>        
            <textarea rows="8" name="descricao" placeholder="Descrição detalhada do treino" required class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-400"></textarea>
        </div>
        <div class="w-full flex justify-end col-span-12">
            <button type="submit" class="bg-red-400 text-white rounded-md px-6 py-2 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-300">Cadastrar</button>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
