<?php
require 'config.php';

function readReparto($id_reparto) {
    global $pdo; // Variabile globale per la connessione al database

    $sql = "SELECT * FROM reparto WHERE id_reparto = :id_reparto"; // Query SQL per leggere un reparto con un determinato ID

    $stmt = $pdo->prepare($sql); // Prepara la query SQL

    $stmt->execute([':id_reparto' => $id_reparto]); // Esegue la query passando l'ID come parametro

    return $stmt->fetch(PDO::FETCH_ASSOC); // Restituisce la riga corrispondente come array associativo
}
try {
    $id_reparto = $_GET['id_reparto']; // Ottiene l'ID del reparto dalla richiesta GET
    $reparto = readReparto($id_reparto); // Legge il reparto con l'ID specificato
    send_response(200, $reparto); // Restituisce il reparto come risposta
} catch (PDOException $e) {
    send_response(500, $e->getMessage()); // Restituisce un messaggio di errore in caso di eccezione
}
?>