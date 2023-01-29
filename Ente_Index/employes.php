<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style2.css">

</head>
<body>
    <div class="container">
        <form action="employes.php" method="get">
            <input type="text" name="search" placeholder="Rechercher un employé...">
            <input type="submit" value="Rechercher">
        </form>
        <!-- trier par  ordre alphabétique ascendant A-Z ou descendant Z-A -->
        <form action="employes.php" method="get">
            <input type="submit" name="asc" value="A-Z">
            <input type="submit" name="desc" value="Z-A">
        </form>
        <!-- trier par date d'embauche, date de naissance, salaire -->
        <form action="employes.php" method="get">
            <input type="submit" name="date_embauche" value="Date d'embauche">
            <input type="submit" name="date_naissance" value="Date de naissance">
            <input type="submit" name="salaire" value="Salaire">
        </form>
        <!-- select avec tous ces tris  -->
        <form action="employes.php" method="get">
            <select name="tri" id="tri">
                <option value="asc">A-Z</option>
                <option value="desc">Z-A</option>
                <option value="date_embauche">Date d'embauche ascendant</option>
                <option value="date_embauche_desc">Date d'embauche descendant</option>
                <option value="date_naissance">Date de naissance ascendant</option>
                <option value="date_naissance_desc">Date de naissance descendant</option>
                <option value="salaire_desc">Salaire descendant</option>
                <option value="salaire">Salaire ascendant</option>
            </select>
            <input type="submit" value="Trier">
        <?php
        include '../config.php';
        // if (isset($_GET['search']) || isset($_GET['asc']) || isset($_GET['desc']) || isset($_GET['date_embauche']) || isset($_GET['date_naissance']) || isset($_GET['salaire'])) {
        // if (isset($_GET['search'])) {
        //     $sql = "SELECT * FROM employes WHERE nom LIKE '%" . $_GET['search'] . "%' OR prenom LIKE '%" . $_GET['search'] . "%'";
        // }
        // if (isset($_GET['asc'])) {
        //     $sql = "SELECT * FROM employes ORDER BY nom ASC";
        // }
        // if (isset($_GET['desc'])) {
        //     $sql = "SELECT * FROM employes ORDER BY nom DESC";
        // }
        // if (isset($_GET['date_embauche'])) {
        //     $sql = "SELECT * FROM employes ORDER BY date_embauche ASC";
        // }
        // if (isset($_GET['date_naissance'])) {
        //     $sql = "SELECT * FROM employes ORDER BY date_naissance ASC";
        // }
        // if (isset($_GET['salaire'])) {
        //     $sql = "SELECT * FROM employes ORDER BY salaire ASC";
        // }
        if (isset($_GET['tri'])) {
            if ($_GET['tri'] == 'asc') {
                $sql = "SELECT * FROM employes ORDER BY nom ASC";
            }
            if ($_GET['tri'] == 'desc') {
                $sql = "SELECT * FROM employes ORDER BY nom DESC";
            }
            if ($_GET['tri'] == 'date_embauche') {
                $sql = "SELECT * FROM employes ORDER BY date_embauche ASC";
            }
            if ($_GET['tri'] == 'date_embauche_desc') {
                $sql = "SELECT * FROM employes ORDER BY date_embauche DESC";
            }
            if ($_GET['tri'] == 'date_naissance') {
                $sql = "SELECT * FROM employes ORDER BY date_naissance ASC";
            }
            if ($_GET['tri'] == 'date_naissance_desc') {
                $sql = "SELECT * FROM employes ORDER BY date_naissance DESC";
            }
            if ($_GET['tri'] == 'salaire') {
                $sql = "SELECT * FROM employes ORDER BY salaire ASC";
            }
            if ($_GET['tri'] == 'salaire_desc') {
                $sql = "SELECT * FROM employes ORDER BY salaire DESC";
            }
        }else{
            $sql = "SELECT * FROM employes";
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $nom = $row["nom"];
                $prenom = $row["prenom"];
                echo "
                <div class='card'>
                    <div class='face face1'>
                        <div class='content'>
                            <img src='https://static.vecteezy.com/ti/vecteur-libre/p1/4274237-person-icon-user-interface-icon-silhouette-of-man-simple-symbol-outline-symbol-in-your-web-site-design-logo-app-ui-webinar-video-chat-vectoriel.jpg'>
                            <h3>$prenom </h3>
                            <h3>$nom</h3>
                        </div>
                    </div>
                    <div class='face face2'>
                        <div class='content'>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cum cumque minus iste veritatis provident at.</p>
                        </div>
                    </div>
                </div>";
            }
        }
         else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>


