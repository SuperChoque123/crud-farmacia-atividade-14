<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Farmácia Vila Boa</title>
</head>
<body>
<h2>Materiais / Insumos</h2>

<form method="GET">
    <input type="text" name="busca" placeholder="Buscar por nome">
    <button type="submit">Buscar</button>
</form>
<a href="create.php">Cadastrar novo</a><br><br>

<table border="1" cellpadding="8" cellspacing="0">
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Unidade</th>
    <th>Estoque Atual</th>
    <th>Preço</th>
    <th>Ações</th>
</tr>
<?php
$busca = $_GET['busca'] ?? '';
$sql = "SELECT * FROM materiais WHERE nome LIKE ? ORDER BY nome";
$stmt = $con->prepare($sql);
$like = "%{$busca}%";
$stmt->bind_param("s", $like);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
    echo "<td>" . htmlspecialchars($row['unidade']) . "</td>";
    echo "<td>" . htmlspecialchars($row['estoque_atual']) . "</td>";
    echo "<td>R$ " . htmlspecialchars($row['preco']) . "</td>";
    echo "<td>
        <a href='edit.php?id={$row['id']}'>Editar</a>
        <a href='delete.php?id={$row['id']}'>Excluir</a>
        </td>";
    echo "</tr>";
}
?>
    </table>
  </body>
</html>
