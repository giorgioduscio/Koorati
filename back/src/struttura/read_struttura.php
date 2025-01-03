<?php
require 'config.php';

// Funzione per ottenere una struttura in base al suo ID
function getStrutturaById($id_struttura) {
    global $pdo;
    
    // Query parametrizzata con il segnaposto :id
    $sql = "SELECT * FROM struttura WHERE id = :id";
    
    // Prepara la query
    $stmt = $pdo->prepare($sql);
    
    // Esegui la query passando l'ID come parametro
    $stmt->execute([':id' => $id_struttura]);
    
    // Recupera una singola riga (struttura)
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

try {
    $id_struttura = $_GET['id_struttura']; // Ottiene l'ID della struttura dalla richiesta GET
    $struttura = getStrutturaById($id_struttura); // Ottiene la struttura con l'ID specificato
    send_response(200, $struttura); // Restituisce la struttura come risposta
} catch (PDOException $e) {
    send_response(500, $e->getMessage()); // Restituisce un messaggio di errore in caso di eccezione
}
// Funzione per ottenere tutte le strutture
function readAllStrutture() {
    global $pdo;
    
    // Query per selezionare tutte le strutture
    $sql = "SELECT * FROM struttura";
    
    // Prepara la query
    $stmt = $pdo->query($sql);
    
    // Recupera tutte le righe (strutture)
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

try {
    $strutture = readAllStrutture(); // Ottiene tutte le strutture
    send_response(200, $strutture); // Restituisce le strutture come risposta
} catch (PDOException $e) {
    send_response(500, $e->getMessage()); // Restituisce un messaggio di errore in caso di eccezione
}
?>
