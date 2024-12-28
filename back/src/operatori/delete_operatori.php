<?php
require 'config.php';

function deleteOperatore($id_operatori) {
    global $pdo;

    $sql = "DELETE FROM operatori WHERE id_operatori = :id_operatori";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([':id_operatori' => $id_operatori]);
}
?>