<?php
$error = "";
    if(isset($_POST['rejoin'])){

        $nm = $_POST['um'];
        $pwd = $_POST['pd'];
        require_once "../core/core.php";
        $ops = new Operations;
        $ops->login($nm,$pwd);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../UI/css/min.css">
    <title>Talkit | Login</title>
</head>
<body>
<header>
    <div class="title">
        <img src="../UI//img/logo.png" alt="" height="70px" width="70px" >
    </div>
    <nav>
        <ul>
            <li><a href="../" class="btn-light">Signup</a></li>
        </ul>
    </nav>
</header>
<main class="flex-column">
    <?php echo $error; ?>
    <h3>    Login to your account</h3>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>Username</label> <br>
            <input type="text" name="um" id="" required> <br>
            <label>Password</label> <br>
            <input type="password" name="pd" id=""> <br>
            <input type="submit" value="Login" name="rejoin" class="btn-primary">
        </form>
</main>
<script src="../UI/js/err_triggers.js"></script>
</body>
</html>
