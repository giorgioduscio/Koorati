<?php
require '../../src/utenti/create_utente.php';
require '../../src/utenti/get_utente.php';
require '../../src/utenti/update_utente.php';
require '../../src/utenti/delete_utente.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        createUtente(
            $data['nome'], $data['cognome'], $data['sesso'], $data['codice_fiscale'],
            $data['luogo_nascita'], $data['data_nascita'], $data['cittadinanza'],
            $data['comune_residenza'], $data['indirizzo_residenza'], $data['cap_residenza'],
            $data['comune_domicilio'], $data['indirizzo_domicilio'], $data['cap_domicilio'],
            $data['tipo_documento'], $data['numero_documento'], $data['rilascio_documento'],
            $data['scadenza_documento'], $data['recapito_tel1'], $data['recapito_tel2'],
            $data['mail'], $data['password'], $data['codice_esenzione']
        );
        echo json_encode(['message' => 'Utente creato con successo']);
        break;
    case 'GET':
        if(isset($_GET['id_utente'])) {
            $utente = getUtenteByID($_GET['id_utente']);
            echo json_encode($utente);
        } else {
            echo json_encode(['message' => 'ID utente non fornito']);
        }
        break;
    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        updateUtente(
            $data['id_utente'], $data['nome'], $data['cognome'], $data['sesso'], $data['codice_fiscale'],
            $data['luogo_nascita'], $data['data_nascita'], $data['cittadinanza'],
            $data['comune_residenza'], $data['indirizzo_residenza'], $data['cap_residenza'],
            $data['comune_domicilio'], $data['indirizzo_domicilio'], $data['cap_domicilio'],
            $data['tipo_documento'], $data['numero_documento'], $data['rilascio_documento'], 
            $data['scadenza_documento'], $data['recapito_tel1'], $data['recapito_tel2'], 
            $data['mail'], $data['password'], $data['codice_esenzione']
        );
        echo json_encode(['message' => 'Utente aggiornato con successo']);
        break;
    case 'DELETE':
        if(isset($_GET['id_utente'])) {
            deleteUtente($_GET['id_utente']);
            echo json_encode(['message' => 'Utente eliminato con successo']);
        } else {
            echo json_encode(['message' => 'ID utente non fornito']);
        }
        break;
    default:
        echo json_encode(['message' => 'Metodo non supportao']);
}
?>