<?php 
    require 'config.php';

    $response = array();
    $userID = $_GET['userID'];

    $query_select_cart = mysqli_query($connection, "SELECT COUNT(*) as Jumlah FROM cart WHERE id_device = '$userID'");

    while ($row = mysqli_fetch_array($query_select_cart)) {
        
        $key['Jumlah'] = $row['Jumlah'];

        array_push($response, $key);
    }

    echo json_encode($response);
?>