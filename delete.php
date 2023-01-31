<?php
include './config.php';
$id = $_GET['id'];
$sql = "DELETE FROM employes WHERE id_employe = $id";
$result = $conn->query($sql);

header('Location: ../front/entreprise.php');