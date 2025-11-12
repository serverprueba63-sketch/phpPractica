<?php
require_once "config.php"; // tu conexión PDO

// Obtiene todos los usuarios
$stmt = $pdo->query("SELECT user, password FROM accounts");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $u) {
    $hashed = password_hash($u['password'], PASSWORD_DEFAULT);
    $update = $pdo->prepare("UPDATE accounts SET password = :hash WHERE user = :user");
    $update->execute([':hash' => $hashed, ':user' => $u['user']]);
    echo "Contraseña hasheada para usuario: " . htmlspecialchars($u['user']) . "<br>";
}

echo "✅ Listo. Ahora puedes borrar este archivo por seguridad.";