<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style1.css">
    <title>Entreprises</title>
</head>

<body>
    <section class="hero-section">
        <div class="card-grid">
            <?php
            include '../config.php';
            $sql = "SELECT * FROM etablissement";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $nom = $row["nom"];
                    echo "<a class='card' href='#'>
                        <div class='card__background'
                            style='background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQB-cgI1KYZQ3r3Gwb1tTwhq37A_JsG2w2IkA&usqp=CAU)'>
                        </div>
                        <div class='card__content'>
                            <p class='card__category'>Entreprises</p>
                            <h3 class='card__heading'>$nom</h3>
                        </div>
                    </a>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </section>
    </div>
</body>

</html>