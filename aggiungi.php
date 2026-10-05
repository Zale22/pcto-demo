<?php
require 'db.php';

$errore = '';
$nome = '';
$cognome = '';
$email = '';
$classe = '';

// Il form invia i dati a questa stessa pagina con il metodo POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $cognome = trim($_POST['cognome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $classe = trim($_POST['classe'] ?? '');

    if ($nome === '' || $cognome === '' || $email === '' || $classe === '') {
        $errore = 'Compila tutti i campi.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errore = 'Inserisci un indirizzo email valido.';
    } else {
        // I segnaposto tengono separati i dati dell'utente dal comando SQL.
        try {
            $query = $pdo->prepare(
                'INSERT INTO studenti (nome, cognome, email, classe) VALUES (:nome, :cognome, :email, :classe)'
            );
            $query->execute([
                'nome' => $nome,
                'cognome' => $cognome,
                'email' => $email,
                'classe' => $classe,
            ]);

            // Torniamo all'elenco: aggiornare la pagina non ripete l'inserimento.
            header('Location: index.php');
            exit;
        } catch (PDOException $eccezione) {
            $errore = 'Inserimento non riuscito. Controlla i dati e riprova.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aggiungi uno studente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Aggiungi uno studente</h1>
        <p><a href="index.php">Torna all'elenco</a></p>

        <?php if ($errore !== ''): ?>
            <p class="errore"><?= htmlspecialchars($errore, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>

        <form method="post" action="aggiungi.php">
            <label for="nome">Nome</label>
            <input id="nome" name="nome" type="text" required value="<?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?>">

            <label for="cognome">Cognome</label>
            <input id="cognome" name="cognome" type="text" required value="<?= htmlspecialchars($cognome, ENT_QUOTES, 'UTF-8') ?>">

            <label for="email">Email</label>
            <input id="email" name="email" type="email" required value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">

            <label for="classe">Classe</label>
            <input id="classe" name="classe" type="text" required value="<?= htmlspecialchars($classe, ENT_QUOTES, 'UTF-8') ?>">

            <button type="submit">Aggiungi</button>
        </form>
    </main>
</body>
</html>
