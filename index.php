<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "oponeum";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Not connected: " . $conn->connect_error);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPONY</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <article>
            <?php 
            
            ?>
        </article>
        <section id="sect1">
            <h2>Opona dnia</h2>
        </section>
        <section id="sect2">
            <h2>Najnowsze zamówienie</h2>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>