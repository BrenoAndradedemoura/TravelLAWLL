<?php
require_once 'init.php';
//abre a conexão
$PDO = db_connect();
// SQL para contar o total de registros
//A biblioteca PDO possui o método rowCount(), mas ele pode ser impreciso.
//É recomendável usar a função COUNT da SQL
$sql_count = "SELECT COUNT(*) AS total FROM TravelLAWII";
//SQL para selecionar os registros
$sql = "SELECT id, name, UF, ano, avaliacao FROM TravelLAWII";
//conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();
//seleciona os registros
$stmt = $PDO->prepare(sql);
$stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <tittle>Sistema de Viagens</title>

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.js"></script>
    <style type="text/css">
        .container{
            margin-top: 50px;
            margin-left: 100px;
        }
    </style>
    </head>
    <body>
        <div class="container">
            <h1>Sistema de Viagens</h1>
            <p><a href="form-add.php">Adicionar Viagem</a></p>
            <h2>Lista de Viagens</h2>
            <p>Total de viagens: <?php echo $total ?></p>
            <?php if ($total > 0): ?>
            <table class="table table-striped" width="50%" border="1">
                <thead>
                    <tr>
                        <th>Cidade de destino</th>
                        <th>UF</th>
                        <th>Ano</th>
                        <th>Avaliação: 0 a 10</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($viagens = $stmt->fecth(PDO::FECTH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $viagens['name'] ?></td>
                        <td><?php echo $viagens['UF'] ?></td>
                        <td><?php echo $viagens['ano'] ?></td>
                        <td><?php echo $viagens['avaliacao'] ?></td>
                        <td>
                            <a href="form-edit-.php?id=<?php echo $user['id'] ?>">Editar</a>
                            <a href="delete.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php else: ?>
            <p>Nenhuma viagem registrada</p>
            <?php endif; ?>
        </div>
    </body>
</html>

