<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Employés</title>
</head>
<body>
    <h1>Employés</h1>
    <div class="container">
        <?php
        include 'config.php';
        $sql = "SELECT * FROM employes";
        $result = $conn->query
        ($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='card' style='width: 18rem;'>
                <div class='card-body'>
                  <h5 class='card-title
                    '>" .$row["prenom"]. " " .$row["nom"]. "</h5>
                    <h6 class='card-subtitle mb-2 text-muted'>Card subtitle</h6>
                    <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href='#' class='card-link'>Card link</a>
                    </div>
                    </div>";
            }
        } else {    
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>


