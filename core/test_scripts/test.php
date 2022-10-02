<?php
    // WHERE FUNCTIONS ARE TURNED TO FEATURES:
    require "../core.php";

    class test extends Sequel{

        public function fetchData()
        {
            $arr = self::fetchArray("uname","users");
            echo $arr;
        }
    }
    $test = new test;
    $test->fetchData();
?>
