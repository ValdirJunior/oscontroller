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
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Itens</h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="new-items.php" class="btn btn-success"><i class="material-icons">&#xE147;</i>Novo Item</a>
					    </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Fornecedor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="items-table"> 
                    </tbody>
                </table>
            
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="js/functions.js"></script>
    <script>
    $(document).ready(function() {
        document.getElementById("items-menu").className="active";
    });


    $(document).ready(function(){
        $('#items-table').empty(); //Limpando a tabela
        $.ajax({
            type:'post',		//Definimos o método HTTP usado
            dataType: 'json',	//Definimos o tipo de retorno
            url: 'list-items.php',//Definindo o arquivo onde serão buscados os dados
            success: function(dados){
                for(var i=0;dados.length>i;i++){
                    //Adicionando registros retornados na tabela
                    $('#items-table').append('<tr><td>'+dados[i].item_code+'</td><td>'+dados[i].name+'</td><td>'+dados[i].value+'</td><td>'+dados[i].provider+'</td><td><a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a><a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td></tr>');
                }
            }
        });
    });
    </script>
</body>
</html>