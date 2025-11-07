<?php include "db.php"; ?>
<?php
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $unidade = $_POST['unidade'];
    $estoque = (int) $_POST['estoque_atual'];
    $preco = (float) $_POST['preco'];

    if ($estoque < 0 || $preco < 0) {
        $msg = "Estoque e preço não podem ser negativos!";
    } else {
        $sql = "INSERT INTO materiais (nome, unidade, estoque_atual, preco) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssid", $nome, $unidade, $estoque, $preco);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        } else {
            $msg = "Erro ao cadastrar.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Cadastrar</title></head>
<body>
<h2>Cadastrar Material</h2>
<p style="color:red;"><?= $msg ?></p>
<form method="POST">
    Nome: <input type="text" name="nome" required><br><br>
    Unidade: <input type="text" name="unidade" required><br><br>
    Estoque Atual: <input type="number" name="estoque_atual" min="0" required><br><br>
    Preço: <input type="number" step="0.01" name="preco" min="0" required><br><br>
    <button type="submit">Salvar</button>
</form>
<br>
<a href="index.php">Voltar</a>
</body>
</html>
