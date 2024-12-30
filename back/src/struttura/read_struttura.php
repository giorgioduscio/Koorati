<?php
require 'config.php';

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
?>
