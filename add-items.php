<?php

    session_start();

    require_once 'functions.php';

    (!is_logged()) ? header("Location: index.php") : null;
    
    $conn = db_connect();

    $code = (isset($_POST['code'])) ? $_POST['code'] : '' ;
    $name = (isset($_POST['name'])) ? $_POST['name'] : '' ;
    $description = (isset($_POST['description'])) ? $_POST['description'] : '' ;
    $value = (isset($_POST['value'])) ? $_POST['value'] : '' ;
    $provider = (isset($_POST['provider'])) ? $_POST['provider'] : '' ;

    if (empty($code))
    {
        $retorno = array('codigo' => 401 , 'mensagem' => 'Preencha o código!');
        echo json_encode($retorno);
        exit();
    }

    if (empty($name))
    {
        $retorno = array('codigo' => 401 , 'mensagem' => 'Preencha o Nome!');
        echo json_encode($retorno);
        exit();
    }

    if (empty($description))
    {
        $retorno = array('codigo' => 401 , 'mensagem' => 'Preencha a Descrição!');
        echo json_encode($retorno);
        exit();
    }

    if (empty($provider))
    {
        $retorno = array('codigo' => 401 , 'mensagem' => 'Informe o Fornecedor!');
        echo json_encode($retorno);
        exit();
    }

    try{
        $sql = 'INSERT INTO item (name, description, item_code, value, provider) VALUES (?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $description);
        $stmt->bindValue(3, $code);
        $stmt->bindValue(4, $value);
        $stmt->bindValue(5, $provider);
        $stmt->execute();

        $return = array('codigo' => 200, 'mensagem' => 'Cadastrado com sucesso!');
        echo json_encode($return);
        exit();
    } catch (PDOExecption $e) {
        $return = array('codigo' => 404, 'mensagem' => 'Falha durante o cadastro!');
        echo json_encode($return);
        exit();
    }
    
