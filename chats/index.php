<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../UI/css/min.css">
    <title>Start chat</title>

</head>
<body>
    <header>
        <div class="title">
            <img src="../UI//img/logo.png" alt="" height="70px" width="70px" >
        </div>

        <nav>
            <ul>
            </ul>
        </nav>

    </header>
    <main class="search-area flex-column">
    <script>
        function search_users(str){
            if(str == ""){
                document.getElementById("chats").innerHTML = "";
            }else{
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status==200){
                        document.getElementById("chats").innerHTML = this.responseText;
                        console.log(this.responseText);
                    }
                }
                xhr.open("GET","../core/xhr/requests.php?search="+str,true);
                xhr.send();
            }
        }
    </script>
        <form action="">
            <input type="text" name="" id="" placeholder="Search here" onkeyup="search_users(this.value)">
        </form>
        <div class="chats-container">
           <div class="chats" id="chats">

            </div>
        </div>
    </main>

</body>
</html>
