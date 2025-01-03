<?php
require 'config.php';

function deleteStruttura($id_struttura) { // Funzione per cancellare una struttura con un determinato ID
    global $pdo;
    
    
    $sql = "DELETE FROM struttura WHERE id = :id"; // Query SQL per cancellare una struttura con un determinato ID
    
   
    $stmt = $pdo->prepare($sql); // Prepara la query SQL per cancellare una struttura con un determinato ID
    
    
    $stmt->execute([':id' => $id_struttura]); // Esegue la query passando l'ID come parametro
}
try {
    $id_struttura = $_GET['id_struttura']; // Ottiene l'ID della struttura dalla richiesta GET
    deleteStruttura($id_struttura); // Cancella la struttura con l'ID specificato
    send_response(200, 'Struttura cancellata con successo'); // Restituisce un messaggio di successo
} catch (PDOException $e) {
    send_response(500, $e->getMessage()); // Restituisce un messaggio di errore in caso di eccezione
}
?>
