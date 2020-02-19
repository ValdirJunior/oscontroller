<?php

session_start();

require_once 'functions.php';

(!is_logged()) ? header("Location: index.php") : null;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Controller</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include_once 'navbar.php' ?>
    
    <div class="container">
        <div class="card-body">
            <h5 class="login-title text-center">Novo Item</h5>

            <form id="new-item-form">
                <div class="form-label-group form-row">
                    <div class="form-group col-md-2">
                        <label for="code">Código</label>
                        <input type="text" class="form-control" name="code" id="code" placeholder="Código" required autofocus>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nome" required autofocus>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="description">Descrição</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Descrição" required autofocus>
                    </div>
                </div>

                <div class="form-label-group form-row">
                    
                    <div class="form-group col-md-2">
                        <label for="value">Valor</label>
                        <input type="text" class="form-control" name="value" id="value" placeholder="Valor" required autofocus>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="provider">Fornecedor</label>
                        <select class="form-control" id="provider" name="provider">
                        </select>
                    </div>
                </div>

                <div class="form-label-group form-row">
                    <div class="form-group col-md-6">
                        <button class="btn btn-lg btn-success btn-block text-uppercase" type="submit" id="btn-save-item">Salvar</button>
                    </div>
                    <div class="form-group col-md-6">
                        <button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit" id="btn-items">Voltar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="js/functions.js"></script>
    <script>
    $(document).ready(function() {
        document.getElementById("items-menu").className="active";
    });

    $(document).ready(function(){
        $('#providers-table').empty(); //Limpando a tabela
        $.ajax({
            type:'post',		//Definimos o método HTTP usado
            dataType: 'json',	//Definimos o tipo de retorno
            url: 'list-providers.php',//Definindo o arquivo onde serão buscados os dados
            success: function(dados){
                if (dados != null) {
                    var selectbox = $('#provider');
                    selectbox.find('option').remove();
                    $.each(dados, function (i, d) {
                        $('<option>').val(d.id).text(d.real_name).appendTo(selectbox);
                    });
                }
            }
        });
    });

    </script>
    <script>
        
    </script>
</body>
</html>