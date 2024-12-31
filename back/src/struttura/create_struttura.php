<?php
require 'config.php'; 

function createStruttura($indirizzo_struttura, $nome_struttura, $telefono_struttura, $email_struttura, $definizione, $disponibilità_reparti, $responsabile_struttura) {
    global $pdo; // Variabile globale per la connessione al database

    $sql = "INSERT INTO struttura (indirizzo_struttura, nome_struttura, telefono_struttura, email_struttura, definizione, disponibilita_reparti, responsabile_struttura) 
            VALUES (:indirizzo_struttura, :nome_struttura, :telefono_struttura, :email_struttura, :definizione, :disponibilita_reparti, :responsabile_struttura)";
            // Query SQL per la creazione di una nuova struttura con i dati forniti

    $stmt = $pdo->prepare($sql); // Prepara la query SQL

    $stmt->execute([ // Array associativo con i valori per i parametri della query
        ':indirizzo_struttura' => $indirizzo_struttura,
        ':nome_struttura' => $nome_struttura,
        ':telefono_struttura' => $telefono_struttura,
        ':email_struttura' => $email_struttura,
        ':definizione' => $definizione,
        ':disponibilita_reparti' => $disponibilità_reparti,
        ':responsabile_struttura' => $responsabile_struttura
    ]);
}
?>
