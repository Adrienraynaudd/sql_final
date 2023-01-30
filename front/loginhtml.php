<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./loginStyle.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-box">
  <h2>Login</h2>
  <form action="../login.php" method="post" autocomplete="off">
    <div class="user-box">
      <input type="text" name="username" required="">
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required="">
      <label>Password</label>
    </div>
    <input  type="submit" value="Register">
    <?php
    if (isset($_GET['erreur'])) {
        $err = $_GET['erreur']; // Get the error code
        if ($err == 1) { // If the error code is 1 or 2, display the error message
            echo "<p style='color:red'>Username or password are empty</p>";
        }else if ($err == 2) {
            echo "<p style='color:red'>Username or password are incorecte </p>";
        }
    }
                ?>
  </form>
</div>
<!-- partial -->
  
</body>
</html>
