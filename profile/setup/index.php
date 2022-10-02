<?php
    $error = "";
    include "../../core/core.php";
    $sfns = new Session_Functions;

    if
    ($sfns->LoggedIn()){
        $arr = $sfns->serve($_SESSION['name']);
        if
        (isset($_POST['submit']))
        {
            $ops = new Operations;
            $name = $_POST['nm'];
            $unm =  $_POST['um'];
            $tmp = $_FILES['profile_image']['tmp_name'];
            $image = $_FILES['profile_image']['name'];

            $bio = $_POST['bio'];
            $ig = $_POST['ig'];
            $tw =  $_POST['twitter'];
            $wb = $_POST['site'];
            $ln = $_POST['linkedin'];
            $arry = [$arr['id'],$name,$image,$bio,$ig,$tw,$wb,$ln];

            if
            (strlen($bio)>140){
                $error = '
                <center>
                <div class="error" id="error">
                    <span class="flex-column" id="close">&times;</span>
                    <p class="err">Bio exceeds 150 characters</p>
                </div>
            </center>
                ';
            }
            if
            (strlen($unm)>12){
                $error = '
            <center>
            <div class="error" id="error">
                <span class="flex-column" id="close">&times;</span>
                <p class="err">Username must be lower than 12 characters</p>
            </div>
        </center>
            ';
            }
            if
            (strlen($name)>26){
                $error = '
                <center>
                <div class="error" id="error">
                    <span class="flex-column" id="close">&times;</span>
                    <p class="err">Name must be lower than 26 characters</p>
                </div>
            </center>
                ';
            }
            if(strlen($unm)<=12 && strlen($name)<=26 && strlen($bio)<=160){
                $ops->setup_profile($arr['id'],$unm,$name,$image,$bio,$ig,$tw,$wb,$ln,$tmp);
            }
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
    <link rel="stylesheet" href="../../UI/css/profile_setup.css">
    <title>Set Up profile</title>
</head>
<body>
    <header>
        <div class="title">
            <img src="../../UI//img/logo.png" alt="" height="70px" width="70px" >
        </div>
        <nav>
            <ul>
            </ul>
        </nav>
    </header>
    <main class="flex-column">

        <div class="container flex-column">
        <center><?php echo $error; ?></center>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post" class="grid-2">
                <div class="left flex-column">
                    <label>Name</label>
                    <input type="text" name="nm" id=""  value="<?php echo $arr["name"]?>">
                    <label>Username</label>
                    <input type="text" name="um" value="<?php echo $arr["uname"]?>">
                    <label>Profile Photo</label>
                    <input type="file" name="profile_image">
                    <label>Bio</label>
                    <textarea name="bio" id="" cols="30" rows="10"><?php echo $arr["bio"]?></textarea>
                </div>
                <div class="right flex-column">
                    <label>Instagram handle (Optional)</label>
                    <input type="text" name="ig" id="" value="<?php echo $arr["ig"]?>">
                    <label>Twitter handle (Optional)</label>
                    <input type="text" name="twitter" id="" value="<?php echo $arr["twitter"]?>">
                    <label>Website (Optional)</label>
                    <input type="url" name="site" id="" value="<?php echo $arr["site"]?>">
                    <label>Linkedin username (Optional)</label>
                    <input type="text" name="linkedin" id="" value="<?php echo $arr["linkedin"]?>">
                    <input type="submit" value="Update Profile" class="btn-primary" name="submit">
                </div>
            </form>
        </div>
    </main>
    <script src="../../UI/js/err_triggers.js"></script>
</body>
</html>
