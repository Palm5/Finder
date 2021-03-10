# Finder
A simple website to make a file system usable from anywhere, like a NAS would do.

Ricordati di controllare il file "backend/sqlconnect.php". Esso contiene le credenziali per connettersi al database SQL. Modificali in base ai parametri impostati nel tuo db.
    $hostname = 'localhost';    ->lascia localhost se il db si trova in locale
    $username = 'root';         ->username del db
    $password = 'lollo98';      ->password del db
Lascia pure invariato il campo $db = 'finder';

Per creare il db il comando è:
mysql -u [username] -p finder < finder.sql