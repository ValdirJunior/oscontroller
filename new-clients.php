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
            <h5 class="login-title text-center">Novo Cliente</h5>

            <form id="new-client-form">
                <div class="form-label-group form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nome" required autofocus>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone">Celular</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Celular" required autofocus>
                    </div>
                </div>

                <div class="form-label-group form-row">
                    <div class="form-group col-md-2">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="birth_date">Data de Nascimento</label>
                        <input type="date" class="form-control" name="birth_date" id="birth_date">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cep-client">CEP</label>
                        <input type="text" class="form-control" name="cep-client" id="cep-client" placeholder="CEP" required autofocus>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">Endereço</label>
                        <input type="text" class="form-control" name="client-address" id="client-address" placeholder="Endereço" required autofocus>
                    </div>
                </div>

                <div class="form-label-group form-row">
                    
                    <div class="form-group col-md-2">
                        <label for="client-address-number">Número</label>
                        <input type="text" class="form-control" name="client-address-number" id="client-address-number" placeholder="Número" required autofocus>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="client-address-city">Cidade</label>
                        <input type="text" class="form-control" name="client-address-city" id="client-address-city" placeholder="Cidade" required autofocus>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="client-address-neighborhood">Bairro</label>
                        <input type="text" class="form-control" name="client-address-neighborhood" id="client-address-neighborhood" placeholder="Bairro" required autofocus>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="client-address-uf">UF</label>
                        <input type="text" class="form-control" name="client-address-uf" id="client-address-uf" placeholder="UF" required autofocus>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="client-address-complement">Complemento</label>
                        <input type="text" class="form-control" name="client-address-complement" id="client-address-complement" placeholder="Complemento" autofocus>
                    </div>
                </div>

                <div class="form-label-group form-row">
                    <div class="form-group col-md-6">
                        <button class="btn btn-lg btn-success btn-block text-uppercase" type="submit" id="btn-save-client">Salvar</button>
                    </div>
                    <div class="form-group col-md-6">
                        <button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit" id="btn-clients">Voltar</button>
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
        document.getElementById("clients-menu").className="active";
        $("#cpf").mask('000.000.000-00', {reverse: true});
        $("#cep-client").mask('00000-000', {reverse: true});
    });

    </script>
    <script>
        
    </script>
</body>
</html>