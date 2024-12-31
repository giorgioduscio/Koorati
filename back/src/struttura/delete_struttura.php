<?php
require 'config.php';

function deleteStruttura($id_struttura) { // Funzione per cancellare una struttura con un determinato ID
    global $pdo;
    
    
    $sql = "DELETE FROM struttura WHERE id = :id"; // Query SQL per cancellare una struttura con un determinato ID
    
   
    $stmt = $pdo->prepare($sql); // Prepara la query SQL per cancellare una struttura con un determinato ID
    
    
    $stmt->execute([':id' => $id_struttura]); // Esegue la query passando l'ID come parametro
}
?>
