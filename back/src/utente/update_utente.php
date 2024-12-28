<?php
require 'config.php';

function updateUtente($id_utente, $nome, $cognome, $sesso, $codice_fiscale, $luogo_nascita, $data_nascita, $cittadinanza, $comune_residenza, $indirizzo_residenza, $cap_residenza, $comune_domicilio, $indirizzo_domicilio, $cap_domicilio, $tipo_documento, $numero_documento, $rilascio_documento, $scadenza_documento, $recapito_tel1, $recapito_tel2, $mail, $password, $codice_esenzione) {
    global $pdo;

    $sql = "UPDATE utenti SET
                ut_nome = :nome, ut_cognome = :cognome, ut_sesso = :sesso, ut_codice_fiscale = :codice_fiscale, ut_luogo_nascita = :luogo_nascita,
                ut_data_nascita = :data_nascita, ut_cittadinanza = ;cittadinanza, ut_comune_residenza = :comune_residenza, ut_indirizzo_residenza = :indirizzo_residenza,
                ut_cap_residenza = :cap_residenza, ut_comune_domicilio = :comune_domicilio, ut_indirizzo_domicilio = :indirizzo_domicilio, ut_cap_domicilio = :cap_domicilio,
                tipo_documento = :tipo_documento, numero_documento = :numero_documento, rilascio_documento = :rilascio_documento, scadenza_documento = :scadenza_documento,
                ut_recapito_tel1 = :recapito_tel1, ut_recapito_tel2 = :recapito_tel2, ut_mail = :mail, ut_password = :password, codice_esenzione = :codice_esenzione
            WHERE id_utente = :id_utente";

    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([
        ':id_utente' => $id_utente,
        ':nome' => $nome,
        ':cognome' => $cognome,
        ':sesso' => $sesso,
        ':codice_fiscale' => $codice_fiscale,
        ':luogo_nascita' => $luogo_nascita,
        ':data_nascita' => $data_nascita,
        ':cittadinanza' => $cittadinanza,
        ':comune_residenza' => $comune_residenza,
        ':indirizzo_residenza' => $indirizzo_residenza,
        ':cap_residenza' => $cap_residenza,
        ':comune_domicilio' => $comune_domicilio,
        ':indirizzo_domicilio' => $indirizzo_domicilio,
        ':cap_domicilio' => $cap_domicilio,
        ':tipo_documento' => $tipo_documento, 
        ':numero_documento' => $numero_documento,
        ':rilascio_documento' => $rilascio_documento,
        ':scadenza_documento' => $scadenza_documento,
        ':recapito_tel1' => $recapito_tel1,
        ':recapito_tel2' => $recapito_tel2,
        ':mail' => $mail,
        ':password' => password_hash($password, PASSWORD_BCRYPT),
        ':codice_esenzione' => $codice_esenzione
    ]);
}
?>