<?php

    session_start();

    require_once 'functions.php';

    (!is_logged()) ? header("Location: index.php") : null;
    
    $conn = db_connect();


    $name = (isset($_POST['name'])) ? $_POST['name'] : '' ;
    $email = (isset($_POST['email'])) ? $_POST['email'] : '';
    $phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';
    $cpf = (isset($_POST['cpf'])) ? $_POST['cpf'] : '';
    $cpf = trim($cpf);
    $cpf = str_replace(".", "", $cpf);
    $cpf = str_replace(",", "", $cpf);
    $cpf = str_replace("-", "", $cpf);


    $birthdate = (isset($_POST['birth_date'])) ? $_POST['birth_date'] : '';

    // $cep = (isset($_POST['cep-client'])) ? $_POST['cpf-client'] : '';
    // $address = (isset($_POST['client-address'])) ? $_POST['client-address'] : '';
    // $number = (isset($_POST['client-address-number'])) ? $_POST['client-address-number'] : '';
    // $city = (isset($_POST['client-address-city'])) ? $_POST['client-address-city'] : '';
    // $neighborhood = (isset($_POST['client-address-neighborhood'])) ? $_POST['client-address-neighborhood'] : '';
    // $uf = (isset($_POST['client-address-uf'])) ? $_POST['client-address-uf'] : '';
    // $complement = (isset($_POST['client-address-complement'])) ? $_POST['client-address-complement'] : '';

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

    if (empty($name))
    {
        $retorno = array('codigo' => 401 , 'mensagem' => 'Preencha o nome!');
        echo json_encode($retorno);
        exit();
    }

    if (empty($cpf))
    {
        $retorno = array('codigo' => 401 , 'mensagem' => 'Preencha o CPF!');
        echo json_encode($retorno);
        exit();
    }

    if(empty($birthdate))
        $birthdate = NULL;

    try{
        $sql = 'INSERT INTO client (name, cpf, email, phone, birth_date) VALUES (?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $cpf);
        $stmt->bindValue(3, $email);
        $stmt->bindValue(4, $phone);
        $stmt->bindValue(5, $birthdate);
        $stmt->execute();

        $return = array('codigo' => 200, 'mensagem' => 'Cadastrado com sucesso!');
        echo json_encode($return);
        exit();
    } catch (PDOExecption $e) {
        $return = array('codigo' => 404, 'mensagem' => 'Falha durante o cadastro!');
        echo json_encode($return);
        exit();
    }
    
