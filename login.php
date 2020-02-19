<?php

session_start();

require 'functions.php';

$conn = db_connect();

$email = (isset($_POST['email'])) ? $_POST['email'] : '' ;
$password = (isset($_POST['password'])) ? $_POST['password'] : '' ;

if (empty($email))
{
	$retorno = array('codigo' => 401 , 'mensagem' => 'Preencha seu e-mail!');
	echo json_encode($retorno);
	exit();
}

if (empty($password))
{
	$retorno = array('codigo' => 401, 'mensagem' => 'Preencha sua senha!');
	echo json_encode($retorno);
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    $retorno = array('codigo' => 401, 'mensagem' => 'Formato de e-mail inválido!');
	echo json_encode($retorno);
    exit();
}

$sql = 'SELECT id, name, email FROM user WHERE email = ? and password = ? LIMIT 1';
$stmt = $conn->prepare($sql);
$stmt->bindValue(1, $email);
$stmt->bindValue(2, make_hash($password));
$stmt->execute();
$return = $stmt->fetch(PDO::FETCH_OBJ);

if (!empty($return))
{
    $_SESSION['id'] = $return->id;
	$_SESSION['name'] = $return->name;
	$_SESSION['email'] = $return->email;
    $_SESSION['logged'] = true;
    $return = array('codigo' => 200, 'mensagem' => 'Logado com sucesso!');
    echo json_encode($return);
    exit();
} else 
{
    $return = array('codigo' => 404, 'mensagem' => 'Usuário não autorizado!');
    echo json_encode($return);
    exit();
}