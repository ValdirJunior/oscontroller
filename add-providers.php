<?php

    session_start();

    require_once 'functions.php';

    (!is_logged()) ? header("Location: index.php") : null;
    
    $conn = db_connect();


    $social_name = (isset($_POST['social_name'])) ? $_POST['social_name'] : '' ;
    $real_name = (isset($_POST['real_name'])) ? $_POST['real_name'] : '' ;
    $email = (isset($_POST['email'])) ? $_POST['email'] : '';
    $phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';
    $cnpj = (isset($_POST['cnpj'])) ? $_POST['cnpj'] : '';
    $cnpj = trim($cnpj);
    $cnpj = str_replace(".", "", $cnpj);
    $cnpj = str_replace(",", "", $cnpj);
    $cnpj = str_replace("-", "", $cnpj);
    $cnpj = str_replace("/", "", $cnpj);

    // $cep = (isset($_POST['cep-client'])) ? $_POST['cnpj-client'] : '';
    // $address = (isset($_POST['client-address'])) ? $_POST['client-address'] : '';
    // $number = (isset($_POST['client-address-number'])) ? $_POST['client-address-number'] : '';
    // $city = (isset($_POST['client-address-city'])) ? $_POST['client-address-city'] : '';
    // $neighborhood = (isset($_POST['client-address-neighborhood'])) ? $_POST['client-address-neighborhood'] : '';
    // $uf = (isset($_POST['client-address-uf'])) ? $_POST['client-address-uf'] : '';
    // $complement = (isset($_POST['client-address-complement'])) ? $_POST['client-address-complement'] : '';

    if (empty($social_name))
    {
        $retorno = array('codigo' => 401 , 'mensagem' => 'Preencha a Razão Social!');
        echo json_encode($retorno);
        exit();
    }

    if (empty($real_name))
    {
        $retorno = array('codigo' => 401 , 'mensagem' => 'Preencha o Nome Fantasia!');
        echo json_encode($retorno);
        exit();
    }

    if (empty($email))
    {
        $retorno = array('codigo' => 401 , 'mensagem' => 'Preencha o e-mail!');
        echo json_encode($retorno);
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $retorno = array('codigo' => 401, 'mensagem' => 'Formato de e-mail inválido!');
        echo json_encode($retorno);
        exit();
    }

    if (empty($phone))
    {
        $retorno = array('codigo' => 401 , 'mensagem' => 'Preencha o celular!');
        echo json_encode($retorno);
        exit();
    }

    if (empty($cnpj))
    {
        $retorno = array('codigo' => 401 , 'mensagem' => 'Preencha o CNPJ!');
        echo json_encode($retorno);
        exit();
    }

    try{
        $sql = 'INSERT INTO provider(cnpj, social_name, real_name, email, phone) VALUES (?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $cnpj);
        $stmt->bindValue(2, $social_name);
        $stmt->bindValue(3, $real_name);
        $stmt->bindValue(4, $email);
        $stmt->bindValue(5, $phone);
        $stmt->execute();

        $return = array('codigo' => 200, 'mensagem' => 'Cadastrado com sucesso!');
        echo json_encode($return);
        exit();
    } catch (PDOExecption $e) {
        $return = array('codigo' => 404, 'mensagem' => 'Falha durante o cadastro!');
        echo json_encode($return);
        exit();
    }
    
