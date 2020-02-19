<?php

function db_connect()
{
    $servername = "localhost";
    $username = "root"; 
    $password = "root";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=testedev",$username,$password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    } catch (PDOException $e) {
        $conn = $e->getMessage();
    }

    return $conn;
}

function make_hash($str)
{
    return sha1(md5($str));
}

function is_logged()
{
    if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true)
    {
        return false;
    }

    return true;
}