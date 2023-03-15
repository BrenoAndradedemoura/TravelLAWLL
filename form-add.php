<?php
require 'init.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Viajens</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="bootstrap/js/bootsrap.js"></script>
    </head>
    <body>
    <div class="container">
        <h1>Sistema de Viajens</h1>
        <h2>Cadastro de Viajens</h2>

        <form action="add.php" method="post">
        <div class="form-group">
            <label for="name">Cidade: </label>
            <input type="text" class="form-control col-sm" name="name" id="name" style="width:25%;" placeholder="Informe seu nome">
    </div>

