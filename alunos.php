<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $genero = $_POST['genero'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $data_inicio = $_POST['data_inicio'];

    $sql = "INSERT INTO alunos (nome, idade, genero, telefone, email, endereco, data_inicio) VALUES ('$nome', $idade, '$genero', '$telefone', '$email', '$endereco', '$data_inicio')";
    $conn->query($sql);
}
?>

<div class="min-h-screen bg-slate-100 flex flex-col items-center p-8">
    <h2 class="text-3xl font-bold text-red-400 mb-8">Cadastrar novo Aluno</h2>
    <form method="POST" action="alunos.php" class="w-full max-w-4xl grid grid-cols-12 gap-4 bg-white shadow-md rounded-lg p-8">
        <div class="col-span-10 flex flex-col space-y-1">
            <label for="nome" class="text-gray-700">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Insira o nome" required class="border h-10 border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-400">
        </div>
        <div class="col-span-2 flex flex-col space-y-1">
            <label for="idade" class="text-gray-700">Idade:</label>
            <input type="number" id="idade" name="idade" placeholder="Idade" required class="border h-10 border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-400">
        </div>
        <div class="col-span-3 flex flex-col space-y-1">
            <label for="genero" class="text-gray-700">Gênero:</label>
            <select id="genero" name="genero" required class="border h-10 border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-400">
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Outro">Outro</option>
            </select>
        </div>
        <div class="col-span-4 flex flex-col space-y-1">
            <label for="telefone" class="text-gray-700">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" class="border h-10 border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-400">
        </div>
        <div class="col-span-5 flex flex-col space-y-1">
            <label for="email" class="text-gray-700">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Insira o e-mail" required class="border h-10 border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-400">
        </div>
        <div class="col-span-3 flex flex-col space-y-1">
            <label for="data_inicio" class="text-gray-700">Matrícula em:</label>
            <input type="date" id="data_inicio" name="data_inicio" required class="border h-10 border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-400">
        </div>
        <div class="col-span-9 flex flex-col space-y-1">
            <label for="endereco" class="text-gray-700">Endereço:</label>
            <input type="text" id="endereco" name="endereco" placeholder="Insira o endereço completo" class="border h-10 border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-400">
        </div>
        <div class="w-full flex justify-end col-span-12">
            <button type="submit" class="bg-red-400 text-white rounded-md px-6 py-2 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-300">Cadastrar</button>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
