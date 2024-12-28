<?php
require 'config.php';

function updateOperatore($id_operatoi, $nome, $cognome, $recapito_tel1, $recapito_tel2, $mail, $password, $dettagli, $id_privilegi, $id_struttura, $id_reparto, $codice_ministeriale) {
    global $pdo;

    $sql = "UPDATE operatori SET op_nome = :nome, op_cognome = :cognome, op_recapito_tel1 = :recapito_tel1, op_recapito_tel2 = :recapito_tel2, op_email = :email, op_password = :password,
                op_dettagli = :dettagli, id_privilegi = :id_privilegi, id_struttura = :id_struttura, id_reparto = :id_reparto, codice_ministeriale = :codice_miisteriale
            WHERE id_operatori = :id_operatori";

    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([
        ':id_operatori' => $id_operatori,
        ':nome' => $nome,
        ':cognome' => $cognome,
        ':recapito_tel1' => $recapito_tel1,
        ':recapito_tel2' => $recapito_tel2,
        ':email' => $email,
        ':password' => password_hash($password, PASSWORD_BCRYPT),
        ':dettagli' => $dettagli,
        ':id_privilegi' => $id_privilegi,
        ':id_struttura' => $id_struttura,
        ':id_reparto' => $id_reparto,
        ':codice_ministeriale' => $codice_ministeriale
    ]);
}
?>