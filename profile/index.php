<?php
    require "../core/core.php";
    $server = new Session_Functions;
    $arr = $server->serve($_SESSION['name']);
    $img = $arr["photo"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../UI/css/profile.css">
    <title>Talkit | Profile</title>
</head>
<body>
    <header>
        <div class="title">
            <img src="../UI//img/logo.png" alt="" height="70px" width="70px" >
        </div>
        <nav>
        <div class="buttons grid-3">
            <a href="#" class="btn-primary flex-column"><i class="fas fa-inbox child" title="Messages" aria-hidden="true"></i></a>
            <a href="./setup/" class="btn-primary flex-column" ><i class="fas fa-pencil-alt"title="Edit Profile"  ></i> </a>
            <a href="#" class="btn-primary flex-column" ><i class="fas fa-sign-out-alt finl" title="logout" aria-hidden="true"></i> </a>
        </div>
        </nav>
    </header>
    <main class="flex-column">
        <div class="cont">
            <div class="left grid-1">
                <img src="<?php echo "../core/media/img/".$arr["photo"] ?>"  height="250px" width="300px">
                <br>
                <div class="bio " >
                    <strong class="name"><?php  echo $arr["name"] ?></strong>
                    <small class="text-primary">@<?php echo $arr["uname"] ?></small>
                    <small><?php  echo $arr["bio"]?></small>
                    <div class="icons grid-6">
                            <a href="https://instagram.com/<?php echo $arr['ig'] ?>" target="_blank"><i class="fab fa-instagram" ></i></a>
                            <a href="https://twitter.com/<?php echo $arr['twitter'] ?>"target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="<?php echo $arr['site'] ?>" target="_blank"><i class="fas fa-link" ></i></a>
                            <a href="https://linkedin.com/in/<?php echo $arr['linkedin'] ?>"target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="right">
                <center>
                <h4 class="text-primary">Recent Chats</h4>
                    <div class="chats flex-column">
                        <div class="chat">
                            <img src="../UI/img/avatar.png" alt="" height="30px" width="30px">
                            <div class="text">
                                <a  href="#" class="h">Kevin doe</a> <br>
                                <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. </small>
                            </div>
                        </div>
                        <div class="chat">
                            <img src="../UI/img/avatar.png" alt="" height="30px" width="30px">
                            <div class="text">
                                <a  href="#" class="h">Jane jacobs</a> <br>
                                <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. </small>
                            </div>
                        </div>
                        <div class="chat">
                            <img src="../UI/img/avatar.png" alt="" height="30px" width="30px">
                            <div class="text">
                                <a  href="#" class="h">Amanda miller</a> <br>
                                <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. </small>
                            </div>
                        </div>
                        <div class="chat">
                            <img src="../UI/img/avatar.png" alt="" height="30px" width="30px">
                            <div class="text">
                                <a  href="#" class="h">Terry james</a> <br>
                                <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. </small>
                            </div>
                        </div>
                        <div class="chat">
                            <img src="../UI/img/avatar.png" alt="" height="30px" width="30px">
                            <div class="text">
                                <a  href="#" class="h">Richard Hendrics</a> <br>
                                <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. </small>
                            </div>
                        </div>
                        <div class="chat">
                            <img src="../UI/img/avatar.png" alt="" height="30px" width="30px">
                            <div class="text">
                                <a  href="#" class="h">Erlich Bachman</a> <br>
                                <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. </small>
                            </div>
                        </div>
                        <div class="chat">
                            <img src="../UI/img/avatar.png" alt="" height="30px" width="30px">
                            <div class="text">
                                <a  href="#" class="h">Ricky Stones</a> <br>
                                <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. </small>
                            </div>
                        </div>
                        <div class="chat">
                            <img src="../UI/img/avatar.png" alt="" height="30px" width="30px">
                            <div class="text">
                                <a  href="#" class="h">Bradley Cooper</a> <br>
                                <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. </small>
                            </div>
                        </div>
                        <div class="chat">
                            <img src="../UI/img/avatar.png" alt="" height="30px" width="30px">
                            <div class="text">
                                <a  href="#" class="h">Tom mueller</a> <br>
                                <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. </small>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </main>
    <script src="../UI/js/font_awesome_main.js"></script>
    <script src="https://kit.fontawesome.com/84b6428a50.js" crossorigin="anonymous"></script>
</body>
</html>
