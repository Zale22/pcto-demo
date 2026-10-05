<?php
// Questo file crea la connessione al database. Le altre pagine lo includono con require.
$host = getenv('DB_HOST') ?: 'localhost';
$database = getenv('DB_NAME') ?: 'pcto_db';
$utente = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD');
if ($password === false) {
    $password = '';
}

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$database;charset=utf8mb4",
        $utente,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $errore) {
    // In classe è utile sapere cosa controllare se MySQL non è pronto.
    exit('Connessione al database non riuscita. Avvia MySQL e importa database.sql da phpMyAdmin.');
}
