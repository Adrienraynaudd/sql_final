<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="EntrepriseStyle.css">
    <title>Entreprises</title>
</head>


<body>
       
    <section class="hero-section">
    <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo "<input type='button' value='add_entreprise' onclick='window.location.href=\"../add_entreprise.php\"'>";
            }else{
                echo "<input type='button' value='connexion' onclick='window.location.href=\"./loginhtml.php\"'>";
            }
            ?>
        <div class="card-grid">
            <?php
            include '../config.php';
            $sql = "SELECT * FROM etablissement";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $nom = $row["nom"];
                    echo "<a class='card' href='http://localhost/front/employes.php?nom=$nom'>
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
            <?php 
            include '../config.php';
            $date = date("m-d");
            $sql = "SELECT * FROM employes WHERE date_naissance LIKE '%$date'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $nom = $row["prenom"] . " " . $row["nom"];
                    echo "<script>alerteAnniversaire('$nom')</script>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </section>
    </div>
</body>

</html>