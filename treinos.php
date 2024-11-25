<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

?>

<div class=" min-h-screen bg-slate-100 flex flex-col items-center p-8">
    <h2 class="text-3xl font-bold text-red-400 mb-8">Treinos cadastrados</h2>
    <div class="bg-white shadow-md rounded-lg p-6 mb-8 w-full max-w-6xl">
    <div class="flex justify-end mb-4">
            <a href="novo_treino.php" class="bg-red-400 text-white rounded-md px-6 py-2 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-300">
                Novo treino
            </a>
        </div>
        <table style="margin-top:12px;" class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Nome</th>
                    <th class="border border-gray-300 px-4 py-2">Descrição</th>
                    <th class="border border-gray-300 px-4 py-2">Nível</th>
                    <th class="border border-gray-300 px-4 py-2">Duração</th>
                    <th class="border border-gray-300 px-4 py-2">Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM treinos";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='hover:bg-gray-50'>
                                <td class='border border-gray-300 px-4 py-2'>{$row['id']}</td>
                                <td class='border border-gray-300 px-4 py-2'>{$row['nome']}</td>
                                <td class='border border-gray-300 px-4 py-2'>{$row['descricao']}</td>
                                <td class='border border-gray-300 px-4 py-2'>{$row['nivel']}</td>
                                <td class='border border-gray-300 px-4 py-2'>{$row['duracao']}</td>
                                <td class='border border-gray-300 px-4 py-2'>{$row['tipo']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='border border-gray-300 px-4 py-2 text-center'>Nenhum treino cadastrado</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
