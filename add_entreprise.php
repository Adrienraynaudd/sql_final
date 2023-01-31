<?php
include 'config.php';
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $id_etablissement = $_POST['id_etablissement'];
    $pays = $_POST['pays'];
    $ville = $_POST['ville'];
    $code_postal = $_POST['code_postal'];
    $nb_employe = $_POST['nb_employe'];
    $adresse = $_POST['adresse'];
    $id_responsable = $_POST['id_responsable'];
    $sql = "INSERT INTO etablissement (nom, id_etablissement, pays, ville, code_postal, nb_employe, adresse, id_responsable) VALUES ('$nom', '$id_etablissement', '$pays', '$ville', '$code_postal', '$nb_employe', '$adresse', '$id_responsable')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: ../front/entreprise.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un etablissement</title>
</head>
<body>
    <form action="add_entreprise.php" method="post">
        <!-- <label for="id">id</label>
        <input type="text" name="id" id="id"></br></br> -->
        <label for="nom">Nom de l'établissement</label>
        <input type="text" name="nom" id="nom"></br></br>
        <label for="id_etablissement">Id</label>
        <input type="number" name="id_etablissement" id="id_etablissement"></br></br>
        <label for="pays">Pays</label>
        <input type="text" name="pays" id="pays"></br></br>
        <label for="ville">Ville</label>
        <input type="text" name="ville" id="ville"></br></br>
        <label for="code_potal">Code Postal</label>
        <input type="number" name="code_postal" id="code_postal"></br></br>
        <label for="nb_employe">Nombre d'employés</label>
        <input type="number" name="nb_employe" id="nb_employe"></br></br>
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" id="adresse"></br></br>
        <label for="id_responsable">Id du responsable</label>
        <input type="number" name="id_responsable" id="id_responsable"></br></br>
        <input type="submit" name="submit" value="Ajouter etablissement">
    </form>
</body>
</html>
