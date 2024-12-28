<?php
require 'config.php';

function deleteUtente($id_utente) {
    global $pdo;

    $sql = "DELETE FROM utenti WHERE id_utente = :idutente";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([':id_utente' => $id_utente]);
}
?>