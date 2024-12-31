<!-- AGGIUNGERE IL CAMPO 'abilitato' DI TIPO BOOLEANO -->
<?php
require 'config.php';

function createOperatore($nome, $cognome, $recapito_tel1, $recapito_tel2, $email, $password, $dettagli, $id_privilegi, $id_struttura, $id_reparto, $codice_ministeriale) {
    global $pdo;

    $sql = "INSERT INTO operatori (op_nome, op_cognome, op_recapito_tel1, op_recapito_tel2, op_email, op_password, op_dettagli, id_privilegi, id_struttura, id_reparto, codice_ministeriale)
            VALUES (:nome, :cognome, :recapito_tel1, :recapito_tel2, :email, :password, :dettagli, :id_privilegi, :id_struttura, :id_reparto, :codice_ministeriale)";

    $stmt = $pdo->prepare($sql);
    $smtm->execute([
        ':nome' => $nome,
        ':cognome' => $cognome,
        ':recapito_tel1' => $recapito_tel1,
        ':recapito_tel2' => $recapito_tel2,
        ':email' => $email,
        ':password' => $password_hash($password, PASSWORD_BCRYPT),
        ':dettagli' => $dettagli,
        ':id_privilegi' => $id_privilegi,
        ':id_struttura' => $id_struttura,
        ':id_reparto' => $id_reparto,
        ':codice_ministeriale' => $codice_ministeriale
    ]);
}
?>