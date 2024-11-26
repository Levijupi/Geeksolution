<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Currículos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background: #e9ecef;
            margin: 10px 0;
            padding: 10px 15px;
            border-radius: 5px;
        }
        li span {
            font-weight: bold;
        }
        li a {
            text-decoration: none;
            color: #007bff;
        }
        li a:hover {
            text-decoration: underline;
        }
        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
        .no-data {
            text-align: center;
            color: #666;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Currículos</h1>
        <?php
        try {
            $pdo = new PDO('sqlite:dados.db');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Processar exclusão, se houver solicitação
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
                $id = (int) $_POST['delete_id'];

                // Obter o caminho do currículo antes de excluir
                $stmt = $pdo->prepare("SELECT caminho_curriculo FROM candidatos WHERE id = ?");
                $stmt->execute([$id]);
                $curriculo = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($curriculo) {
                    // Excluir arquivo do servidor
                    unlink($curriculo['caminho_curriculo']);
                }

                // Excluir do banco de dados
                $stmt = $pdo->prepare("DELETE FROM candidatos WHERE id = ?");
                $stmt->execute([$id]);

                echo "<script>alert('Candidato excluído com sucesso!');</script>";
            }

            // Obter lista de candidatos
            $stmt = $pdo->query("SELECT * FROM candidatos ORDER BY data_envio DESC");
            $candidatos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($candidatos) {
                echo "<ul>";
                foreach ($candidatos as $candidato) {
                    echo "<li>
                            <p><span>Nome:</span> {$candidato['nome']}</p>
                            <p><span>Email:</span> {$candidato['email']}</p>
                            <p><span>Telefone:</span> {$candidato['telefone']}</p>
                            <p><span>Estado:</span> {$candidato['estado']}</p>
                            <p><span>Cidade:</span> {$candidato['cidade']}</p>
                            <p><a href='{$candidato['caminho_curriculo']}' target='_blank'>Visualizar Currículo</a></p>
                            <form method='post' style='display:inline;'>
                                <input type='hidden' name='delete_id' value='{$candidato['id']}'>
                                <button type='submit' class='delete-btn'>Excluir</button>
                            </form>
                          </li>";
                }
                echo "</ul>";
            } else {
                echo "<p class='no-data'>Nenhum currículo encontrado.</p>";
            }
        } catch (PDOException $e) {
            echo "Erro ao acessar o banco de dados: " . $e->getMessage();
        }
        ?>
    </div>
</body>
</html>
