<?php include "db.php"; ?>
<?php
$id = $_GET['id'] ?? 0;

$sql = "DELETE FROM materiais WHERE id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
exit;
?>
