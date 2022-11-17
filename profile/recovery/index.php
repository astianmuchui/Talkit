<?php
    require_once "../../core/core.php";
    $name = $_SESSION['name'];
    $sfns = new Session_Functions;
    if
    ($sfns->LoggedIn())
    {
    // Don't take the term wrongly
    $user_data = $sfns->serve($name);

    if(isset($_POST['submit'])){
        $qtn = $_POST['qtns'];
        $qa = $_POST['qa'];
        $op = new Operations;
        $op->set_recovery($qtn,$qa,$name);
    }
    }else{
        $sfns->redirect("../../");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../UI/css/recovery.css">
    <title>Set your recovery question</title>
</head>
<body>
    <header>
        <div class="title">
            <img src="../../UI//img/logo.png" alt="" height="70px" width="70px" >
        </div>
    </header>
    <main class="flex-column">
        <div class="cont ">
            <h4 class="text-primary">Set a password recovery question</h4>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <select name="qtns" id="" value="Options" required>
                    <option value="1">Who is your favorite artist</option>
                    <option value="2">Which is your favorite food</option>
                    <option value="3">Which is your lucky number</option>
                </select>
                <label class="text-primary">Set Answer to the question above</label>
                <input type="text" name="qa" required>
                <button type="submit" class="btn-primary" name="submit">Set question</button>
            </form>
        </div>
    </main>
</body>
</html>
