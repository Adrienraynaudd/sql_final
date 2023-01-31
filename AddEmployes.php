<?php
include 'config.php';
if (isset($_POST['submit'])) {
    $longueurKey = 15;
$id_employe = "";
for ($i = 1; $i < $longueurKey; $i++) { //Generate a random key
	$id_employe .= mt_rand(0, 9);
}
    $nom = SecurityCheck($conn, $_POST['nom']);
    $prenom = SecurityCheck($conn, $_POST['prenom']);
    $date_de_naissance = SecurityCheck($conn, $_POST['date_de_naissance']);
    $genre = SecurityCheck($conn, $_POST['genre']);
    $lieu_naissance = SecurityCheck($conn, $_POST['lieu_de_naissance']);
    $diplome = SecurityCheck($conn, $_POST['diplome']);
    $id_etablissement = SecurityCheck($conn, $_POST['id_etablissement']);
    $id_responsable = SecurityCheck($conn, $_POST['id_responsable']);
    $id_poste = SecurityCheck($conn, $_POST['id_poste']);
    $salaire = SecurityCheck($conn, $_POST['salaire']);
    $date_embauche = SecurityCheck($conn, $_POST['date_embauche']);
    $num_tel = SecurityCheck($conn, $_POST['num_tel']);
    $adresse_mail = SecurityCheck($conn, $_POST['adresse_mail']);
    $adresse_postal = SecurityCheck($conn, $_POST['adresse_postal']);
    $ville = SecurityCheck($conn, $_POST['ville']);
    $pays = SecurityCheck($conn, $_POST['pays']);
    $permis = SecurityCheck($conn, $_POST['permis']);
    $password = SecurityCheck($conn, $_POST['password']);

    $sql = "INSERT INTO employes (id_employe,nom, prenom, date_naissance, genre, lieu_naissance, diplome, id_etablissement, id_responsable, id_poste, salaire, date_embauche, num_tel, adresse_mail, adresse_postale, ville, pays, permis, password ) VALUES ('$id_employe', '$nom', '$prenom', '$date_de_naissance', '$genre', '$lieu_naissance', '$diplome', '$id_etablissement', '$id_responsable', '$id_poste', '$salaire', '$date_embauche', '$num_tel', '$adresse_mail', '$adresse_postal', '$ville', '$pays', '$permis', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: ../front/employes.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
function SecurityCheck($conn, $data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = mysqli_real_escape_string($conn, $data);
        return $data;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un employer</title>
</head>
<body>
    <form action="addEmployes.php" method="post">
        <label for="nom">Nom de l'employer</label>
        <input type="text" name="nom" id="nom"></br></br>
        <label for="prenom">prenom</label>
        <input type="text" name="prenom" id="prenom"></br></br>
        <label for="date_de_naissance">date de naissance</label>
        <input type="date" name="date_de_naissance" id="date_de_naissance"></br></br>
        <label for="genre">genre</label>
        <input type="text" name="genre" id="genre">
        </br></br>
        <label for="lieu_de_naissance">lieu de naissance</label>
        <input type="text" name="lieu_de_naissance" id="lieu_de_naissance"></br></br>
        <label for="diplome">diplome</label>
        <input type="text" name="diplome" id="diplome"></br></br>
        <label for="id_etablissemnt">id etablissemnt(1,2,3)</label>
        <input type="text" name="id_etablissement" id="id_etablissement">
        </br></br>
        <label for="id_responsable">id responsable</label>
        <input type="number" name="id_responsable" id="id_responsable"></br></br>
        <label for="id_poste"> id poste</label>
        <input type="number" name="id_poste" id="id_poste"></br></br>
        <label for="salaire">salaire</label>
        <input type="text" name="salaire" id="salaire"></br></br>
        <label for="date_embauche">date d'embauche</label>
        <input type="date" name="date_embauche" id="date_embauche"></br></br>
        <label for="num_tel"> telephone</label>
        <input type="text" name="num_tel" id="num_tel"></br></br>
        <label for="adresse_mail">adresse mail</label>
        <input type="text" name="adresse_mail" id="adresse_mail"></br></br>
        <label for="adresse_postal">adresse_postal</label>
        <input type="text" name="adresse_postal" id="adresse_postal"></br></br>
        <label for="ville">ville</label>
        <input type="text" name="ville" id="ville"></br></br>
        <label for="pays">pays</label>
        <input type="text" name="pays" id="pays"></br></br>
        <label for="permis">permis</label>
        <input type="text" name="permis" id="permis">
        </br></br>
        <label for="password">mot de passe</label>
        <input type="text" name="password" id="password"></br></br>


        <input type="submit" name="submit" value="Ajouter Employer">
    </form>
</body>
</html>
