<?php
    // Not important
    $db = mysqli_connect("localhost","root","","lab");
    if(isset($_POST['submit'])){
        $nm = $_POST['text'];
        $exec = mysqli_query($db,"INSERT INTO `test` (nm) VALUES('$nm')");
        if($exec){
            echo "Inserted";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="text" name="text" id="" value="some weird stuff">
    <input type="submit" value="submit" name="submit">
</form>
</body>
</html>
