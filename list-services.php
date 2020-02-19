<?php

    session_start();

    require_once 'functions.php';

    (!is_logged()) ? header("Location: index.php") : null;
    
    $conn = db_connect();
    
    
    $sql = 'SELECT sv.id, sv.date, sv.hour, sv.description, cl.name as client, sv.value_hour, sv.status 
                FROM service sv
            LEFT JOIN client cl ON (sv.client = cl.id);';
    $stmt = $conn->query($sql);

    while ($row = $stmt->fetch()) {

        $date_service = strtotime($row['date']);
        $date_now = strtotime(date('Y-m-d'));
        
        $date_diff = abs($date_now - $date_service);

        $years = floor($date_diff / (365*60*60*24));
        $months = floor(($date_diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($date_diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        $row['days'] = $days;

        if ($row['status'] == 2){
            $row['situation'] = 'success';
        } else if ($row['status'] == 1) {
            if ($days <= 3) {
                $row['situation'] = 'primary';
            } else if ($days <= 7) {
                $row['situation'] = 'warning';
            } else {
                $row['situation'] = 'danger';
            }
        } else if ($row['status'] == 0) {
            if ($days <= 1) {
                $row['situation'] = 'primary';
            } else if ($days <= 3) {
                $row['situation'] = 'warning';
            } else {
                $row['situation'] = 'danger';
            }
        }

        $date = new DateTime($row['date']);
        $row['date'] = date_format($date, 'd/m/Y');
        $services[] = array_map('utf8_encode', $row); 
    }

    //Passando vetor em forma de json
    echo json_encode($services);
    exit();