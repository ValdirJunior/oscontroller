<?php

session_start();

require 'functions.php';

is_logged() ? header("Location: dashboard.php"): null;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Controller</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="text-center">
    
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card-body">
                    <div class="card card-sigin">
                        

                        <h5 class="login-title text-center">Login</h5>

                        <form class="form-signin" id="login-form">
                            <div class="form-label-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>
                            </div>


                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" id="btn-login">Entrar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="js/functions.js"></script>
</body>
</html>
