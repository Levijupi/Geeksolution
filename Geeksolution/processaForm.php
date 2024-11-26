<?php
try {
    $pdo = new PDO('sqlite:dados.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $diretorio = 'curriculos/';
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0777, true);
    }

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nome = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $telefone = $_POST['number'] ?? '';
        $estado = $_POST['state'] ?? '';
        $cidade = $_POST['town'] ?? '';
        $arquivo = $_FILES['cury'] ?? null;

       
        if (empty($nome) || empty($email) || empty($telefone) || empty($estado) || empty($cidade)) {
            echo "<script>alert('Por favor, preencha todos os campos obrigatórios.');</script>";
            exit;
        }

       
        if ($arquivo && $arquivo['error'] === UPLOAD_ERR_OK) {
            $nomeArquivo = time() . '_' . basename($arquivo['name']);
            $caminhoDestino = $diretorio . $nomeArquivo;

            if (move_uploaded_file($arquivo['tmp_name'], $caminhoDestino)) {
              
                $stmt = $pdo->prepare("
                    INSERT INTO candidatos (nome, email, telefone, estado, cidade, caminho_curriculo) 
                    VALUES (?, ?, ?, ?, ?, ?)
                ");
                $stmt->execute([$nome, $email, $telefone, $estado, $cidade, $caminhoDestino]);


                echo "<script>
                    alert('Currículo enviado e salvo com sucesso!');
                    window.location.href = 'index.html';
                </script>";
            } 
        } 
    }
} catch (PDOException $e) {
    echo "<script>alert('Erro ao acessar o banco de dados: " . $e->getMessage() . "');</script>";
}
?>
