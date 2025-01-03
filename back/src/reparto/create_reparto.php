<?php
require 'config.php';

function createReparto($id_struttura, $descrizione_reparto, $disponibilita_posti, $responsabile_reparto, $numero_operatori) {
    global $pdo; // Variabile globale per la connessione al database

    // Inserimento dei dati nella tabella reparto
    $sql = "INSERT INTO reparto (id_struttura, descrizione_reparto, disponibilita_posti, responsabile_reparto, numero_operatori) 
            VALUES (:id_struttura, :descrizione_reparto, :disponibilita_posti, :responsabile_reparto, :numero_operatori)";
    // Query SQL per la creazione di un nuovo reparto

    $stmt = $pdo->prepare($sql); // Prepara la query SQL

    try {
        // Esegui la query SQL con i parametri forniti
        $stmt->execute([
            ':id_struttura' => $id_struttura,
            ':descrizione_reparto' => $descrizione_reparto,
            ':disponibilita_posti' => $disponibilita_posti,
            ':responsabile_reparto' => $responsabile_reparto,
            ':numero_operatori' => $numero_operatori
        ]);

        // Restituisce l'ID dell'ultima riga inserita, che è il valore di id_reparto (PK)
        return $pdo->lastInsertId(); 

    } catch (PDOException $e) {
        // Se si verifica un errore, catturalo e restituisci un messaggio
        send_response(500, $e->getMessage());
    }
}
?>
