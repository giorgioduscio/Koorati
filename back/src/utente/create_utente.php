<?php
require 'config.php';

function createUtente($nome, $cognome, $sesso, $codice_fiscale, $luogo_nascita, $data_nascita, $cittadinanza, $comune_residenza, $indirizzo_residenza, $cap_residenza, $comune_domicilio, $indirizzo_domicilio, $cap_domicilio, $tipo_documento, $numero_documento, $rilascio_documento, $scadenza_documento, $recapito_tel1, $recapito_tel2, $mail, $password, $codice_esenzione) {
    global $pdo;

    $sql = "INSERT INTO utenti (ut_nome, ut_cognome, ut_sesso, ut_codice_fiscale, ut_luogo_nascita, ut_data_nascita, ut_cittadinanza, ut_comune_residenza, ut_indirizzo_residenza, ut_cap_residenza, ut_comune_domicilio, ut_indirizzo_domicilio, ut_cap_domicilio, tipo_documento, numero_documeto, rilascio_documento, scadenza_documento, ut_recapito_tel1, ut_recapito_tel2, ut_mail, ut_password, codice_esenzione
            VALUES (:nome, :cognome, :sesso, :codice_fiscale, :luogo_nascita, :data_nascita, :cittadinanza, :comune_residenza, :indirizzo_residenza, :cap_residenza, :comune_domicilio, :indirizzo_domicilio, :cap_domicilio, :tipo_documento, :numero_documento, :rilascio_documento, :scadenza_documento, :recapito_tel1, :recapito_tel2, :mail, :password, :codice_esenzione)";

    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([
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