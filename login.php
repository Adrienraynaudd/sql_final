<?php
require_once 'config.php';

$username = SecurityCheck($conn, $_POST['username']);
$password = SecurityCheck($conn, $_POST['password']);
if ($username !== "" && $password !== "") {
   $response = getPasswordWithName("employes", $username, $conn);
   $hash = $response;
   if (password_verify($password, $hash)) {
        $_SESSION['username'] = $username;
       header('Location: ../front/entreprise.php');
   } else {
       header('Location: ../front/loginhtml.php?erreur=2'); // Error code 2: wrong username or password
   }
}else {
    header('Location: ../front/loginhtml.php?erreur=1'); // Error code 1: empty fields
}


function SecurityCheck($conn, $data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = mysqli_real_escape_string($conn, $data);
        return $data;
    }
    function getPasswordWithName(string $table, string $name, $conn)
    {
        if ($conn == false) {
            die("ERROR : couldn't connect properly to database : " . mysqli_connect_error());
        }
        $date = date("Y-m-d H:i:s", time());
        $sql = "SELECT password FROM " . $table . " WHERE Name = '" . $name . "'";
        if ($request = $conn->prepare($sql)) {
            $request->execute();
            $resultQuerry = $request->get_result();
        } else {
            die("Can't prepare the sql request properly : " . $sql . " " . mysqli_error($conn));
        }
        mysqli_close($conn);
        return $resultQuerry->fetch_assoc()['password'];
    }
