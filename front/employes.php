<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="EmployesStyle.css">
</head>
<body>
    <div class="container" id="container">
    <a href="http://localhost/sql_final/front/pageAccueil.php" class="button" style = "background-color: #000; color: #fff; text-decoration: none; padding: 5px 10px; border-radius: 5px;">Accueil</a>
    <input type="text" name="search" placeholder="Rechercher un employé..." id="searchbar" onsubmit="Cleansearchbar()" onkeyup="searchbar()">
        </form>
        <div class="filtre" id="filtre">
            Ξ Filtre
            <script src="filtre.js"></script>
        </div>
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
            <a href="employes.php" style="color: #fff; text-decoration: none; background-color: #000; padding: 5px 10px; border-radius: 5px;">Réinitialiser</a>
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo "<input type='button' value='Add Employes' onclick='window.location.href=\"../AddEmployes.php\"'>";
                echo "<input type='button' value='deconnexion' onclick='window.location.href=\"../deconnexion.php\"'>";
            }else{
                echo "<input type='button' value='connexion' onclick='window.location.href=\"./loginhtml.php\"'>";
            }
            ?>
            <a href="./pageAccueil.php" class="button" style = "background-color: #000; color: #fff; text-decoration: none; padding: 5px 10px; border-radius: 5px;">Accueil</a>
        </form>
        <?php
        include '../config.php';
        if(isset($_GET['Startdate']) || isset($_GET['Enddate']) || isset($_GET['genreMale']) || isset($_GET['genreFemale']) || isset($_GET['salaireMin']) || isset($_GET['salaireMax'])) {
            $sql = "SELECT * FROM employes WHERE ";
            if(isset($_GET['Startdate']) && $_GET['Startdate'] != "") {
                $sql .= 'date_naissance >= "' . $_GET['Startdate'] . '"AND ';
            }
            if(isset($_GET['Enddate']) && $_GET['Enddate'] != "") {
                $sql .= 'date_naissance <= "' . $_GET['Enddate'] . '"AND ';
            }
            if(isset($_GET['genreMale']) && $_GET['genreMale'] != "")  {
                $sql .= 'genre = "' . $_GET['genreMale'] . '"AND ';
            }
            if(isset($_GET['genreFemale']) && $_GET['genreFemale'] != "") {
                $sql .= 'genre = "' . $_GET['genreFemale'] . '"AND ';
            }
            if (isset($_GET['salaireMin']) && $_GET['salaireMin'] != "" && isset($_GET['salaireMax']) && $_GET['salaireMax'] != "") {
                $sql .= 'salaire BETWEEN ' . $_GET['salaireMin'] . ' AND '. $_GET['salaireMax'] . 'AND ';
            }else if(isset($_GET['salaireMin']) && $_GET['salaireMin'] != "") {
                $sql .= 'salaire >= ' . $_GET['salaireMin'] . 'AND ';
            }else if(isset($_GET['salaireMax']) && $_GET['salaireMax'] != "") {
                $sql .= 'salaire <= ' . $_GET['salaireMax'] . 'AND ';
            }
            $sql = substr($sql, 0, -4);
        }else if (isset($_GET['tri']))  {
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
            } else {
            if (isset($_GET['nom'])) {
                if ($_GET['nom'] == 'Ankama-Dofus') {
                    $sql = "SELECT * FROM employes WHERE id_etablissement = 1";
                } else if ($_GET['nom'] == 'Ankama-Wakfu') {
                    $sql = "SELECT * FROM employes WHERE id_etablissement = 2";
                } else if ($_GET['nom'] == 'Ankama-Studios') {
                    $sql = "SELECT * FROM employes WHERE id_etablissement = 3";
                }
            } else {
                $sql = "SELECT * FROM employes";
            }
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row["id_employe"];
                $nom = $row["nom"];
                $prenom = $row["prenom"];
                $responsable = $row["id_responsable"];
                $poste = $row["id_poste"];
                $sql2 = "SELECT nom FROM employes WHERE id_employe = $responsable";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                    while($row2 = $result2->fetch_assoc()) {
                        $responsable = $row2["nom"] . " " . $row["prenom"];
                    }
                }
                $sql3 = "SELECT nom_poste FROM postes WHERE id_poste = $poste";
                $result3 = $conn->query($sql3);
                if ($result3->num_rows > 0) {
                    while($row3 = $result3->fetch_assoc()) {
                        $poste = $row3["nom_poste"];
                    }
                }
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
                        <p>Poste : " . $poste . "</p>
                        <p>Responsable : " . $responsable . "</p>
                        <p>Date de naissance : " . $row["date_naissance"] . "</p>
                        <p>Date d'embauche : " . $row["date_embauche"] . "</p>
                        <p>Adresse mail : " . $row["adresse_mail"] . "</p>
                        <p>Adresse : " . $row["adresse_postale"] . "</p>
                        <p>Ville : " . $row["ville"] . "</p>
                        <p>Salaire annuel : " . $row["salaire"] . " €</p>
                        </div>";
                        if (isset($_SESSION['username'])){
                            echo "<a href='../delete.php?id=" . $id . "'><button class='btn btn-danger'>Supprimer</button></a>";
                        }else{
                            echo "<a href='loginhtml.php'><button class='btn btn-danger'>login</button></a>";
                        }
                    echo"</div>
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
<script>
function Cleansearchbar() {
  var search = document.getElementById("searchbar").value;
  search = search.replace(/[^a-zA-Z0-9@]+/g, '');
  document.getElementById("searchbar").value = search;
}
function searchbar(){
    var search = document.getElementById("searchbar").value;
    console.log(search);
    //if the search element is contain in the name or the firstname of the employee show his card else hide it
    var cards = document.getElementsByClassName("card");
    for (var i = 0; i < cards.length; i++) {
        var card = cards[i];
        var name = card.getElementsByTagName("h3")[0].innerHTML;
        var firstname = card.getElementsByTagName("h3")[1].innerHTML;
        if (name.toLowerCase().includes(search.toLowerCase()) || firstname.toLowerCase().includes(search.toLowerCase())) {
            card.style.display = "";
        }else{
            card.style.display = "none";
        }
    }
}
</script>
</html>


