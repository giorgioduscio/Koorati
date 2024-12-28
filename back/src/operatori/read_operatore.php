<?php
require 'config.php';

function getOperatoreById($id_operatori) {
    global $pdo;

    $sql = "SELECT * FROM operatori WHERE id_operatori = :id_operatori";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id_operatori' => $id_operatori]);
    return $stmt->fetch();
}
?>