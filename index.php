<?php
require 'db.php';

// SELECT legge le righe della tabella. fetchAll le mette in un elenco PHP.
$query = $pdo->query('SELECT id, nome, cognome, email, classe FROM studenti ORDER BY id');
$studenti = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Studenti PCTO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Studenti PCTO</h1>
        <p>Questi dati arrivano dalla tabella <strong>studenti</strong> del database.</p>
        <p><a href="aggiungi.php">Aggiungi uno studente</a></p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Email</th>
                    <th>Classe</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($studenti as $studente): ?>
                    <tr>
                        <td><?= htmlspecialchars((string) $studente['id'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($studente['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($studente['cognome'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($studente['email'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($studente['classe'], ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if (count($studenti) === 0): ?>
            <p>Non ci sono ancora studenti. Aggiungi il primo!</p>
        <?php endif; ?>
    </main>
</body>
</html>
