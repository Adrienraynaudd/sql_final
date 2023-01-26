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
        <?php
        include '../config.php';
        if (isset($_GET['search'])) {
            $sql = "SELECT * FROM employes WHERE nom LIKE '%" . $_GET['search'] . "%' OR prenom LIKE '%" . $_GET['search'] . "%'";
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


