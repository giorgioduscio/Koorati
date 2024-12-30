<?php
require '../../src/utenti/create_struttura.php';  //file php che si occupano del CRUD
require '../../src/utenti/read_struttura.php';
require '../../src/utenti/update_struttura.php';
require '../../src/utenti/delete_struttura.php';

header('Content-Type: application/json'); //intestazione della risposta HTTP per indicare che la risposta del server sarà in formato JSON.
$method = $_SERVER['REQUEST_METHOD']; //cattura il metodo della richiesta HTTP (GET, POST, PUT, DELETE) inviato dal client

function validate_json($input) {
    // Decodifica il JSON
    json_decode($input);

    // Ottieni l'errore di parsing, se ce n'è uno
    $error = json_last_error();
    if ($error !== JSON_ERROR_NONE) {
        echo json_encode(['message' => 'Input JSON non valido']);
        http_response_code(400); // Bad Request
        exit;
    }

    // Se il JSON è valido, restituisci true
    return true;
}

switch ($method) { //switch case(struttura di controllo condizionale) per distinguere tra i vari tipi di richieste (POST, GET, PUT, DELETE)

    case 'POST': //richiesta POST per creare una nuova struttura
        $data = json_decode(file_get_contents('php://input'), true); //legge i dati inviati in formato JSON dal body della richiesta HTTP e lo converte in un array associativo PHP.
        validate_json(file_get_contents('php://input')); //valida il JSON ricevuto

        //richiama la funzione createStruttura() passando i dati della nuova struttura come parametri per array associativo
        createStruttura($data['indirizzo_struttura'], 
        $data['nome_struttura'], 
        $data['telefono_struttura'],
        $data['email_struttura'], 
        $data['definizione'], 
        $data['disponibilità_reparti'], 
        $data['responsabile_struttura']);

        //validazione dell'operazione di creazione della struttura
        function valida_indirizzo($via, $numeroCivico, $cap, $citta, $provincia, $stato) {
            if (empty($via) || empty($numero) || empty($cap) || empty($citta) || empty($provincia) || empty($stato)) {//controlla se uno dei campi è vuoto
                echo json_encode(['message' => 'tutti i campi sono obbligatori']);
                http_response_code(400); // Bad Request
                exit;
            }
            return true;
            
            //validazione del numeroCivico
            //funzione !preg_match() che significa "Se non c'è corrispondenza con la regex" 
            if (!preg_match('/^[0-9]{1,4}$/', $numeroCivico)) { //regex per il numero civico
                echo json_encode(['message' => 'Il numero civico deve essere composto da 1 a 4 cifre']);
                http_response_code(400); // Bad Request
                exit;
            }
            return true;

            //validazione del CAP
            if (!preg_match('/^[0-9]{5}$/', $cap)) {
                echo json_encode(['message' => 'Il CAP deve essere composto da 5 cifre']);
                http_response_code(400); // Bad Request
                exit;
            }
            return true;

            //validazione della citta
            if (!preg_match('/^[a-zA-Z ]{2,50}$/', $citta)) {
                echo json_encode(['message' => 'La città deve essere composta da 2 a 50 caratteri']);
                http_response_code(400); // Bad Request
                exit;
            }
            return true;
            //validazione della provincia
            if (!preg_match('/^[a-zA-Z ]{2,50}$/', $provincia)) {
                echo json_encode(['message' => 'La provincia deve essere composta da 2 a 50 caratteri']);
                http_response_code(400); // Bad Request
                exit;
            }
            return true;
            //validazione dello stato
            if (!preg_match('/^[a-zA-Z ]{2,50}$/', $stato)) {
                echo json_encode(['message' => 'Lo stato deve essere composto da 2 a 50 caratteri']);
                http_response_code(400); // Bad Request
                exit;
            }
            return true;

        }

        //validazione del nome della struttura

        function valida_nome($nome_struttura) {
            if (!preg_match('/^[a-zA-Z0-9 ]{2,50}$/', $nome_struttura)) {
                echo json_encode(['message' => 'Il nome della struttura deve essere composto da 2 a 50 caratteri']);
                http_response_code(400); // Bad Request
                exit;
            }
            return true;
        }
            

    
        




    case 'GET': //richiesta GET per visualizzare una o più strutture
        if (isset($_GET['id_struttura'])) { //richiesta GET specifica per visualizzare una struttura in particolare (id_struttura fornito)
            $struttura = getStrutturaById($_GET['id_struttura']); //richiesta GET specifica per visualizzare una struttura in particolare (id_struttura fornito)
            echo json_encode($struttura);(['message' => 'Struttura trovata con successo']); // risposta JSON che contiene la struttura trovata e un messaggio di successo
        } else {
            $strutture = getStrutturaById('d_struttura');
            echo json_encode($struttura);(['message' => 'Struttura non trovata']);
        }
        break;

    case 'PUT': //richiesta PUT per aggiornare una struttura esistente
        $data = json_decode(file_get_contents('php://input'), true);
        updateStruttura($data['id_struttura'], $data['indirizzo_struttura'], $data['nome_struttura'], $data['telefono_struttura'], $data['email_struttura'], $data['definizione'], $data['disponibilità_reparti'], $data['responsabile_struttura']);
        echo json_encode(['message' => 'Struttura aggiornata con successo']);
        break;

    case 'DELETE': //richiesta DELETE per cancellare una struttura esistente (id_struttura fornito)
        if (isset($_GET['id_struttura'])) {
            deleteStruttura($_GET['id_struttura']);
            echo json_encode(['message' => 'Struttura cancellata con successo']);
        } else {
            echo json_encode(['message' => 'ID struttura non fornito']);
        }
        break;

    default: echo json_encode(['message' => 'Richiesta non supportata']); //risposta JSON che contiene un messaggio di errore se la richiesta HTTP non è supportata
}

?>