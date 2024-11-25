<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

?>

<div class="min-h-screen bg-slate-100 flex flex-col items-center p-8">
    <h2 class="text-3xl font-bold text-red-400 mb-8">Alunos cadastrados</h2>
    <div class="bg-white shadow-md rounded-lg p-6 mb-8 w-full max-w-6xl">
        <div class="flex justify-end mb-4">
            <a href="novo_aluno.php" class="bg-red-400 text-white rounded-md px-6 py-2 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-300">
                Novo aluno
            </a>
        </div>
        <table style="margin-top:12px;" class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Nome</th>
                    <th class="border border-gray-300 px-4 py-2">Idade</th>
                    <th class="border border-gray-300 px-4 py-2">Gênero</th>
                    <th class="border border-gray-300 px-4 py-2">Telefone</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Endereço</th>
                    <th class="border border-gray-300 px-4 py-2">Data de Início</th>
                    <th class="border border-gray-300 px-4 py-2">Treino</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "
                    SELECT 
                        a.id, 
                        a.nome, 
                        a.idade, 
                        a.genero, 
                        a.telefone, 
                        a.email, 
                        a.endereco, 
                        a.data_inicio, 
                        t.nome AS treino_nome 
                    FROM alunos a
                    LEFT JOIN treinos_alunos ta ON a.id = ta.aluno_id
                    LEFT JOIN treinos t ON ta.treino_id = t.id
                ";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='hover:bg-gray-50'>
                                <td class='border border-gray-300 px-4 py-2'>{$row['id']}</td>
                                <td class='border border-gray-300 px-4 py-2'>{$row['nome']}</td>
                                <td class='border border-gray-300 px-4 py-2'>{$row['idade']}</td>
                                <td class='border border-gray-300 px-4 py-2'>{$row['genero']}</td>
                                <td class='border border-gray-300 px-4 py-2'>{$row['telefone']}</td>
                                <td class='border border-gray-300 px-4 py-2'>{$row['email']}</td>
                                <td class='border border-gray-300 px-4 py-2'>{$row['endereco']}</td>
                                <td class='border border-gray-300 px-4 py-2'>{$row['data_inicio']}</td>
                                <td class='border border-gray-300 px-4 py-2'>" . ($row['treino_nome'] ?? 'Sem treino') . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' class='border border-gray-300 px-4 py-2 text-center'>Nenhum aluno cadastrado</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
