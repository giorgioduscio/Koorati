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

try {
    // Ottiene i dati della struttura dalla richiesta POST
    $id_struttura = $_POST['id_struttura'];
    $indirizzo_struttura = $_POST['indirizzo_struttura'];
    $nome_struttura = $_POST['nome_struttura'];
    $telefono_struttura = $_POST['telefono_struttura'];
    $email_struttura = $_POST['email_struttura'];
    $definizione = $_POST['definizione'];
    $disponibilità_reparti = $_POST['disponibilità_reparti'];
    $responsabile_struttura = $_POST['responsabile_struttura'];
    
    // Aggiorna la struttura con i dati forniti
    updateStruttura($id_struttura, $indirizzo_struttura, $nome_struttura, $telefono_struttura, $email_struttura, $definizione, $disponibilità_reparti, $responsabile_struttura);
    
    send_response(200, 'Struttura aggiornata con successo'); // Restituisce un messaggio di successo
} catch (PDOException $e) {
    send_response(500, $e->getMessage()); // Restituisce un messaggio di errore in caso di eccezione
}

?>
