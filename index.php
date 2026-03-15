<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "opony";


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
                $sql = "SELECT * FROM `opony` ORDER BY cena ASC LIMIT 10;";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if ($row["sezon"] == "letnia") {
                            echo "<figure class='opona'>";
                            echo "<img src='lato.png' alt='letnia'>";
                            echo "<h4>Opona: " . $row["producent"] . " " . $row["model"] . "</h4>";
                            echo "<h3>Opona: " . $row["cena"] . "</h3>";
                            echo "</figure>";
                        } elseif ($row["sezon"] == "zimowa") {
                            echo "<figure class='opona'>";
                            echo "<img src='zima.png' alt='zimowa'>";
                            echo "<h4>Opona: " . $row["producent"] . " " . $row["model"] . "</h4>";
                            echo "<h3>Opona: " . $row["cena"] . "</h3>";
                            echo "</figure>";
                        } elseif ($row["sezon"] == "uniwersalna") {
                            echo "<figure class='opona'>";
                            echo "<img src='uniwer.png' alt='uniwersalna'>";
                            echo "<h4>Opona: " . $row["producent"] . " " . $row["model"] . "</h4>";
                            echo "<h3>Opona: " . $row["cena"] . "</h3>";
                            echo "</figure>";
                        }
                    }
                }
            ?>
        </article>
        <section id="sect1">
            <img src="opona.png" alt="Opona">
            <h2>Opona dnia</h2>
            <?php 
                $sql = "SELECT producent, model, sezon, cena FROM `opony` WHERE nr_kat = 9";
                $result = $conn->query($sql);
                $opona = $result->fetch_assoc();

                echo "<h2>" . $opona["producent"] . " model " . $opona["model"] . "</h2>";
                echo "<h2>Sezon" . $opona["sezon"] . "</h2>";
                echo "<h2>Tylko" . $opona["cena"] . "zł</h2>";

            ?>
        </section>
        <section id="sect2">
            <h2>Najnowsze zamówienie</h2>
            <?php 
                $sql = "SELECT zamowienie.id_zam, zamowienie.ilosc, opony.model, opony.cena FROM `zamowienie` INNER JOIN opony ON zamowienie.nr_kat = opony.nr_kat ORDER BY RAND() LIMIT 1;";
                $result = $conn->query($sql);
                $opona = $result->fetch_assoc();
                $oponaWartosc = $opona["cena"] * $opona["ilosc"];

                echo "<h2>" . $opona["id_zam"] . " " . $opona["ilosc"] . " sztuki modelu " . $opona["model"] . "</h2>";
                echo "<h2>Wartość zamówiena " . $oponaWartosc . "zł</h2>";
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>

<?php 
    header('refresh: 10');
?>