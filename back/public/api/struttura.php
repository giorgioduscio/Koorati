<?php
// Inclusione dei file per le operazioni CRUD in modo sicuro
// realpath restituisce il percorso assoluto del file
require_once realpath('../../src/utenti/create_struttura.php');
require_once realpath('../../src/utenti/read_struttura.php');
require_once realpath('../../src/utenti/update_struttura.php');
require_once realpath('../../src/utenti/delete_struttura.php');

// Intestazione della risposta HTTP
header('Content-Type: application/json');

// Funzione per validare l'input JSON
function validate_json($input) {
    // Verifica se l'input è un JSON valido
    $decoded = json_decode($input, true);
    // Se il JSON non è valido restituisci un errore
    if (json_last_error() !== JSON_ERROR_NONE) {
        send_response(400, 'Input JSON non valido');
    }// Altrimenti restituisci l'input decodificato
    return $decoded;
}

// Funzione per inviare una risposta JSON
function send_response($http_code, $message, $data = null) {
    // Imposta il codice di risposta HTTP
    http_response_code($http_code);
    // Crea l'array di risposta JSON con il messaggio e i dati opzionali
    $response = ['message' => htmlspecialchars($message)];
    // Aggiunge i dati se specificati
    if ($data !== null) {
        $response['data'] = $data;
    }// Invia la risposta JSON e interrompi lo script
    echo json_encode($response);
    exit;
}

// Regole di validazione
$validation_rules = [
    'indirizzo_struttura' => ['pattern' => '/^.{1,100}$/', 'error' => 'Indirizzo non valido'],
    'nome_struttura' => ['pattern' => '/^[a-zA-Z0-9 ]{2,50}$/', 'error' => 'Nome struttura non valido'],
    'telefono_struttura' => ['pattern' => '/^[0-9]{10}$/', 'error' => 'Telefono non valido'],
    'email_struttura' => [
        'pattern' => fn($email) => filter_var($email, FILTER_VALIDATE_EMAIL),
        'error' => 'Email non valida'
    ],
    'definizione' => ['pattern' => '/^.{1,200}$/', 'error' => 'Definizione non valida']
];



// Funzione per validare l'input
function validate_input($data, $rules) {
    foreach ($rules as $field => $rule) {
        if (!isset($data[$field])) {
            send_response(400, "Campo '$field' mancante");
        }
        if (is_callable($rule['pattern'])) {
            if (!$rule['pattern']($data[$field])) {
                send_response(400, $rule['error']);
            }
        } else if (!preg_match($rule['pattern'], $data[$field])) {
            send_response(400, $rule['error']);
        }
    }
}


// Ottieni il metodo della richiesta
$method = $_SERVER['REQUEST_METHOD'];

// Switch per gestire i metodi HTTP
switch ($method) {

    case 'POST':
        $data = validate_json(file_get_contents('php://input'));
        validate_input($data, $validation_rules);

        $id = createStruttura(
            $data['indirizzo_struttura'], 
            $data['nome_struttura'], 
            $data['telefono_struttura'],
            $data['email_struttura'], 
            $data['definizione'], 
            $data['disponibilita_reparti'] ?? null, 
            $data['responsabile_struttura'] ?? null
        );

        send_response(201, 'Struttura creata con successo', ['id' => $id]);
        break;

    case 'GET':
        if (isset($_GET['id_struttura'])) {
            $id = filter_var($_GET['id_struttura'], FILTER_VALIDATE_INT);
            if (!$id) {
                send_response(400, 'ID struttura non valido');
            }
            $struttura = getStrutturaById($id);
            if ($struttura) {
                send_response(200, 'Struttura trovata', $struttura);
            } else {
                send_response(404, 'Struttura non trovata');
            }
        } else {
            // Recupero tutte le strutture direttamente senza funzione intermedia
            $strutture = readAllStrutture(); 
            if ($strutture) {
                send_response(200, 'Strutture trovate', $strutture);
            } else {
                send_response(404, 'Nessuna struttura trovata');
            }
        }
        break;

    case 'PUT':
        $data = validate_json(file_get_contents('php://input'));
        if (!isset($data['id_struttura'])) {
            send_response(400, 'ID struttura non fornito');
        }
        validate_input($data, $validation_rules);

        $success = updateStruttura(
            $data['id_struttura'],
            $data['indirizzo_struttura'],
            $data['nome_struttura'],
            $data['telefono_struttura'],
            $data['email_struttura'],
            $data['definizione'],
            $data['disponibilita_reparti'] ?? null,
            $data['responsabile_struttura'] ?? null
        );

        if ($success) {
            send_response(200, 'Struttura aggiornata con successo');
        } else {
            send_response(500, 'Errore durante l\'aggiornamento della struttura');
        }
        break;

    case 'DELETE':
        if (!isset($_GET['id_struttura'])) {
            send_response(400, 'ID struttura non fornito');
        }

        $id = filter_var($_GET['id_struttura'], FILTER_VALIDATE_INT);
        if (!$id) {
            send_response(400, 'ID struttura non valido');
        }

        $success = deleteStruttura($id);
        if ($success) {
            send_response(200, 'Struttura cancellata con successo');
        } else {
            send_response(404, 'Struttura non trovata');
        }
        break;

    default:
        send_response(405, 'Metodo non supportato');
}
?>
