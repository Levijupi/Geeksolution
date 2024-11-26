<?php
try {
    $pdo = new PDO('sqlite:dados.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $result = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='candidatos'");

    if (!$result->fetch()) {
        $sql = "CREATE TABLE candidatos (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            email TEXT NOT NULL,
            telefone TEXT NOT NULL,
            cidade TEXT NOT NULL,
            estado TEXT NOT NULL,
            caminho_curriculo TEXT NOT NULL,
            data_envio TEXT DEFAULT CURRENT_TIMESTAMP
        )";

        $pdo->exec($sql);
        echo "Tabela criada com sucesso!";
    } else {
        echo "Tabela 'candidatos' já existe!";
    }
} catch (PDOException $e) {
    echo "Erro ao acessar o banco de dados: " . $e->getMessage();
}
?>
