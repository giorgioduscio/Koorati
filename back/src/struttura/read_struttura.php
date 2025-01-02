<?php
require 'config.php';

// Funzione per ottenere una struttura in base al suo ID
function getStrutturaById($id_struttura) {
    global $pdo;
    
    // Query per selezionare la struttura con un determinato ID
    $sql = "SELECT * FROM struttura WHERE id = :id";
    
    // Prepara la query
    $stmt = $pdo->prepare($sql);
    
    // Esegui la query passando l'ID come parametro
    $stmt->execute([':id' => $id_struttura]);
    
    // Recupera una singola riga (struttura)
    return $stmt->fetch(PDO::FETCH_ASSOC);
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
?>
