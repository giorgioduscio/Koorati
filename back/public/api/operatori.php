<?php
require '../../src/operatori/create_operatore.php';
require '../../src/operatori/get_operatore.php';
require '../../src/operatori/update_operatore.php';
require '../../src/operatori/delete_operatore.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        createOperatore(
            $data['nome'], $data['cognome'], $data['recapito_tel1'], $data['recapito_tel2'],
            $data['email'], $data['password'], $data['dettagli'], $data['id_privilegi'],
            $data['id_struttura'], $data['id_reparto'], $data['codice_ministeriale']
        );
        echo json_encode(['message' => 'Operatore creato con successo']);
        break;
    case 'GET':
        if (isset($_GET['id_operatori'])) {
            $operatore = getOperatoreById($_GET['id_operatori']);
            echo json_encode($operatore);
        } else {
            echo json_encode(['message' => 'ID operatore non fornito']);
        }
        break;
    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        updateOperatore(
            $data['id_operatori'], $data['nome'], $data['cognome'], $data['recapito_tel1'],
            $data['recapito_tel2'], $data['email'], $data['password'], $data['dettagli'],
            $data['id_privilegi'], $data['id_struttura'], $data['id_reparto'], $data['codice_ministeriale']
        );
        echo json_encode(['message' => 'Operatore aggiornato con successo']);
        break;
    case 'DELETE':
        if (isset($_GET['id_operatori'])) {
            deleteOperatore($_GET['id_operatori']);
            echo json_encode(['message' => 'Operatore eliminato con successo']);
        } else {
            echo json_encode(['message' => 'ID operatore non fornito']);
        }
        break;
    default:
    echo json_encode(['message' => 'Metodo non supportato']);
}
?>