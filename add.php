<?php
require_once 'init.php';
//pega os dados do formulario
$name = isset($_POST['name']) ? $_POST['name'] : null;
$Uf = isset($_POST['UF']) ? $_POST['UF'] : null;
$ano = isset($_POST['ano']) ? $_POST['ano'] : null;
$avaliaco = isset($_POST['avaliacao']) ? $_POST['avaliacao'] : null;

//Validação (bem simples, só pra evitar dados vazios)
if (empty($name) || empty($Uf) || empty($ano) || empty($avaliaco))
{
    echo "Volte e preencha todos os campos";
    exit;
}
//insere no Banco
$PDO = db_connect();
$sql = "INSERT INTO users(name, UF, ano, avaliacao) VALUES(:name, :Uf, :ano, :avaliacao)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':Uf', $Uf);
$stmt->bindParam(':ano', $ano);
$stmt->bindParam(':avaliacao', $avaliacao);
if ($stmt-> execute())
{
    header('location: index.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->erroInfo());
}
?>








