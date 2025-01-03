<?php
require 'config.php';
// Funzione per cancellare un reparto esistente
function deleteReparto($id_reparto) {
    global $pdo;
    
    $sql = "DELETE FROM reparto WHERE id_reparto = :id_reparto";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([':id_reparto' => $id_reparto]);
}
// Prova a eseguire il blocco di istruzioni
// Ottiene l'ID del reparto dalla richiesta GET
try {
    $id_reparto = $_GET['id_reparto'];
    deleteReparto($id_reparto);
    send_response(200, 'Reparto cancellato con successo');
} catch (PDOException $e) {
    send_response(500, $e->getMessage());
}

?>