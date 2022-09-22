<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./UI/css/min.css">
    <title>Talkit | Get started</title>
</head>
<body>
<header>
    <div class="title">
        <img src="./UI//img/logo.png" alt="" height="70px" width="70px" >
    </div>
    <nav>
        <ul>
            <li><a href="./login" class="btn-light">Login</a></li>
        </ul>
    </nav>
</header>
<main class="flex-column">
<?php
    if(isset($_POST['join'])){
        $name = $_POST['unm'];
        $password  = $_POST['pwd'];
        require_once "./core/core.php";
        $ops = new Operations;
        $ops->signup($name,$password);
    }
?>
    <h3>Signup now !</h3>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>Username</label> <br>
            <input type="text" name="unm" required> <br>
            <label>Password</label> <br>
            <input type="password" name="pwd" id=""> <br>
            <input type="submit" name="join" value="Signup" class="btn-primary">
        </form>
</main>
<script src="./UI/js/err_triggers.js"></script>
</body>
</html>
