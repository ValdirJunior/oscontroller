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
            <h5 class="login-title text-center">Novo Fornecedor</h5>

            <form id="new-provider-form">
                <div class="form-label-group form-row">
                    <div class="form-group col-md-4">
                        <label for="social_name">Razão Social</label>
                        <input type="text" class="form-control" name="social_name" id="social_name" placeholder="Razão Social" required autofocus>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="real_name">Nome Fantasia</label>
                        <input type="text" class="form-control" name="real_name" id="real_name" placeholder="Nome Fantasia" required autofocus>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    </div>
                </div>

                <div class="form-label-group form-row">
                    <div class="form-group col-md-4">
                        <label for="phone">Celular</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Celular" required autofocus>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="CNPJ" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cep-provider">CEP</label>
                        <input type="text" class="form-control" name="cep-provider" id="cep-provider" placeholder="CEP" required autofocus>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="provider-addressaddress">Endereço</label>
                        <input type="text" class="form-control" name="provider-address" id="provider-address" placeholder="Endereço" required autofocus>
                    </div>
                </div>

                <div class="form-label-group form-row">
                    
                    <div class="form-group col-md-2">
                        <label for="provider-address-number">Número</label>
                        <input type="text" class="form-control" name="provider-address-number" id="provider-address-number" placeholder="Número" required autofocus>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="provider-address-city">Cidade</label>
                        <input type="text" class="form-control" name="provider-address-city" id="provider-address-city" placeholder="Cidade" required autofocus>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="provider-address-neighborhood">Bairro</label>
                        <input type="text" class="form-control" name="provider-address-neighborhood" id="provider-address-neighborhood" placeholder="Bairro" required autofocus>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="provider-address-uf">UF</label>
                        <input type="text" class="form-control" name="provider-address-uf" id="provider-address-uf" placeholder="UF" required autofocus>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="provider-address-complement">Complemento</label>
                        <input type="text" class="form-control" name="provider-address-complement" id="provider-address-complement" placeholder="Complemento" autofocus>
                    </div>
                </div>

                <div class="form-label-group form-row">
                    <div class="form-group col-md-6">
                        <button class="btn btn-lg btn-success btn-block text-uppercase" type="submit" id="btn-save-provider">Salvar</button>
                    </div>
                    <div class="form-group col-md-6">
                        <button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit" id="btn-providers">Voltar</button>
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
        document.getElementById("providers-menu").className="active";
        $("#cnpjj").mask('00.000.000/0000-00', {reverse: true});
        $("#cep-provider").mask('00000-000', {reverse: true});
    });

    </script>
    <script>
        
    </script>
</body>
</html>