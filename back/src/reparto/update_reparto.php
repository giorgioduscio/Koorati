<?php
require 'config.php';

// Funzione per aggiornare un reparto esistente
function updateReparto($id_reparto, $nome_reparto, $descrizione_reparto, $id_struttura) {
    global $pdo;
    
    $sql = "UPDATE reparto 
            SET nome_reparto = :nome_reparto, 
                descrizione_reparto = :descrizione_reparto, 
                id_struttura = :id_struttura 
            WHERE id_reparto = :id_reparto";
    // Query SQL per aggiornare un reparto esistente
    $stmt = $pdo->prepare($sql);
    // Prepara la query SQL
    $stmt->execute([
        ':id_reparto' => $id_reparto,
        ':nome_reparto' => $nome_reparto,
        ':descrizione_reparto' => $descrizione_reparto,
        ':id_struttura' => $id_struttura
    ]);
}


try { // Prova a eseguire il blocco di istruzioni
    $id_reparto = $_POST['id_reparto'];
    $nome_reparto = $_POST['nome_reparto'];
    $descrizione_reparto = $_POST['descrizione_reparto'];
    $id_struttura = $_POST['id_struttura'];
    
    updateReparto($id_reparto, $nome_reparto, $descrizione_reparto, $id_struttura);
    
    send_response(200, 'Reparto aggiornato con successo');
} catch (PDOException $e) {
    send_response(500, $e->getMessage('Errore')); 
}

?>