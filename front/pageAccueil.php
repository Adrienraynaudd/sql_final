<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="pageAccueilStyle.css" />
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div class="Bandeau">
        <img class="logo" src="../logo.png" alt="Logo">
        </div>
        <div class="typewriter-container">
            <div class="typewriter">
                <p>BIENVENUE sur votre CRM.</p>
            </div>
        </div>
        <div class="Cubes_links">
            <a class="link" href='http://localhost/front/employes.php' ><div class="column" style="background-color: #32607A "><p>💼<br>&emsp;<br> Employés</p></a></div>
            <a class="link" href='http://localhost/front/entreprise.php' ><div class="column" style="background-color:#32607A"><p>🏭<br>&emsp;<br> Etablissements</p></a></div>
        </div>
        <script>
    function alerteAnniversaire(nom) {
        alert("C'est l'anniversaire de l'employé " + nom);
    }
</script>
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
    </body>
</html>
