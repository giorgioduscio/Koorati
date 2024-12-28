<?php
require 'config.php';

function getUtenteByID($id_utente) {
    global $pdo;

    $sql = "SELECT * FROM utenti WHERE id_utente = :id_utente";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([':id_utente' => $id_utente]);
    return $stmt -> fetch();
}
?>