# Demo PCTO: HTML, PHP e database

1. Installa XAMPP (se necessario) e apri il suo pannello di controllo.
2. Avvia **Apache** e **MySQL**.
3. Metti questa cartella in `C:\xampp\htdocs\pcto`.
4. Apri [phpMyAdmin](http://localhost/phpmyadmin/) nel browser.
5. Vai su **Importa**, scegli `database.sql` e avvia l'importazione.
6. Apri [http://localhost/pcto/](http://localhost/pcto/).

Per la prova in classe, aggiungi uno studente dal sito. Poi apri la tabella `studenti` in phpMyAdmin e aggiorna la pagina: vedrai la nuova riga.

La connessione in `db.php` usa l'utente `root` senza password, come nella configurazione XAMPP locale predefinita.

## Deploy con Dokploy

Il progetto include `compose.yaml`, un container PHP/Apache e un container MariaDB. In Dokploy crea un servizio **Docker Compose** collegato al repository GitHub, usando `compose.yaml` e il tipo **Docker Compose**. Nella scheda **Environment** imposta `DB_PASSWORD` e `DB_ROOT_PASSWORD` con due password lunghe e diverse, poi assegna un dominio al servizio `web` sulla porta interna `80` e avvia il deploy. Il database viene inizializzato con i tre studenti di esempio solo alla prima creazione del volume.
