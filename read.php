<?php
 
include 'banco.php';
 
 
if (!isset($_GET['codigo'])) {
    die('ID não fornecido.');
}
 
 
$pdo = Banco::conectar();
 
 
$id = $_GET['codigo'];
$sql = 'SELECT * FROM tb_alunos WHERE codigo = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
 
 
if ($stmt->rowCount() == 0) {
    die('Aluno não encontrado.');
}
 
 
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);
 
Banco::desconectar();
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Detalhes do Aluno</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Detalhes do Aluno</h2>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td><?php echo $aluno['codigo']; ?></td>
            </tr>
            <tr>
                <th>Nome</th>
                <td><?php echo $aluno['nome']; ?></td>
            </tr>
            <tr>
                <th>Endereço</th>
                <td><?php echo $aluno['endereco']; ?></td>
            </tr>
            <tr>
                <th>Telefone</th>
                <td><?php echo $aluno['fone']; ?></td>
            </tr>
            <tr>
                <th>E-mail</th>
                <td><?php echo $aluno['email']; ?></td>
            </tr>
            <tr>
                <th>Idade</th>
                <td><?php echo $aluno['idade']; ?></td>
            </tr>
        </table>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </div>
</body>
</html>