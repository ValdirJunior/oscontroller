<?php

    session_start();

    require_once 'functions.php';

    (!is_logged()) ? header("Location: index.php") : null;
    
    $conn = db_connect();
    
    
    $sql = 'SELECT item.id, name, value, item_code, pv.real_name as provider FROM item
            LEFT JOIN provider pv ON item.provider = pv.id ';
    $stmt = $conn->query($sql);

    while ($row = $stmt->fetch()) {
        $clients[] = array_map('utf8_encode', $row); 
    }

    //Passando vetor em forma de json
    echo json_encode($clients);
    exit();