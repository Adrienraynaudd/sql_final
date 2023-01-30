<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="EmployesStyle.css">

</head>
<body>
    <div class="container">
        <?php
        include '../config.php';
        $sql = "SELECT * FROM employes";
        $result = $conn->query
        ($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $nom = $row["nom"];
                echo "
                    <div class='card'>
                        <div class='face face1'>
                            <div class='content'>
                                <img src='https://static.vecteezy.com/ti/vecteur-libre/p1/4274237-person-icon-user-interface-icon-silhouette-of-man-simple-symbol-outline-symbol-in-your-web-site-design-logo-app-ui-webinar-video-chat-vectoriel.jpg'>
                                <h3> $nom </h3>
                            </div>
                        </div>
                        <div class='face face2'>
                            <div class='content'>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cum cumque minus iste veritatis provident at.</p>
                            </div>
                        </div>
                    </div>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</body>image.png
</html>


