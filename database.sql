-- Crea il database e selezionalo per i comandi successivi.
CREATE DATABASE IF NOT EXISTS pcto_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE pcto_db;

-- Ogni studente ha un ID assegnato automaticamente dal database.
CREATE TABLE IF NOT EXISTS studenti (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cognome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    classe VARCHAR(20) NOT NULL
);

-- Tre righe di esempio, visibili subito nella pagina e in phpMyAdmin.
INSERT INTO studenti (nome, cognome, email, classe) VALUES
    ('Anna', 'Rossi', 'anna.rossi@example.com', '3A'),
    ('Luca', 'Bianchi', 'luca.bianchi@example.com', '3B'),
    ('Sara', 'Verdi', 'sara.verdi@example.com', '4A');
