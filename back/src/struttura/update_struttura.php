<?php
require 'config.php';

function updateStruttura($id_struttura, $indirizzo_struttura, $nome_struttura, $telefono_struttura, $email_struttura, $definizione, $disponibilità_reparti, $responsabile_struttura) {
    global $pdo;
    
    // Query SQL per aggiornare una struttura esistente
    $sql = "UPDATE struttura 
            SET indirizzo_struttura = :indirizzo_struttura, 
                nome_struttura = :nome_struttura, 
                telefono_struttura = :telefono_struttura, 
                email_struttura = :email_struttura, 
                definizione = :definizione, 
                disponibilita_reparti = :disponibilita_reparti, 
                responsabile_struttura = :responsabile_struttura 
            WHERE id = :id";
    
    // Prepara la query
    $stmt = $pdo->prepare($sql);
    
    // Esegui la query passando i dati da aggiornare
    $stmt->execute([
        ':id' => $id_struttura,
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
