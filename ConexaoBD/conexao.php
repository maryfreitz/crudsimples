<?php
// Verificar se foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST["id"]) ? $_POST["id"] : null;
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : null;
    $email = isset($_POST["email"]) ? $_POST["email"] : null;
    $celular = isset($_POST["celular"]) ? $_POST["celular"] : null;
} else {
    // Inicializa variáveis vazias se não foi enviado
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    $nome = null;
    $email = null;
    $celular = null;
}

// Conexão com o banco de dados
try {
    $conexao = new PDO("mysql:host=localhost;dbname=crudsimples", "root", "Aluno");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("SET NAMES utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão: " . $erro->getMessage();
    exit;
}

// Inserção no banco de dados
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && !empty($nome)) {
    try {
        $stmt = $conexao->prepare("INSERT INTO contatos (nome, email, celular) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $celular);
        
        if ($stmt->execute()) {
            echo "<p style='color: green;'>Dados cadastrados com sucesso!</p>";
            // Limpa variáveis após inserir
            $id = null;
            $nome = null;
            $email = null;
            $celular = null;
        } else {
            echo "<p style='color: red;'>Erro ao tentar efetivar cadastro.</p>";
        }
    } catch (PDOException $erro) {
        echo "<p style='color: red;'>Erro: " . $erro->getMessage() . "</p>";
    }
}
?>
