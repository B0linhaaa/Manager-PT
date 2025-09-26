<?php
    include './assets/components/db_connection.php';

    foreach ($_POST as $key => $value) {
        if ($value !== '[]') {
            if (strpos($key, 'faults-') !== false) {
                $playerId = substr($key, 7);
                $query = "select * from players_faults where player_id = " . $playerId;
                $result = $conn->query($query);
                $row = $result->fetch();

                if (!empty($row['faults'])) {
                    $faultsDB = json_decode($row['faults'], true);
                    $faultsPost = json_decode($value, true);
                    $newValues = array_merge($faultsDB, $faultsPost);
                    
                    $query = "update players_faults set faults = '" . json_encode($newValues) . "' where player_id = " . $playerId;
                    $conn->exec($query);
                } else {
                    $query = "update players_faults set faults = '" . $value . "' where player_id = " . $playerId;
                    $conn->exec($query);
                }
            }
        }
    }

    header("Location: /Manager-PT/treinos.php?mes_ano=" . $_POST['mes_ano']);
?>