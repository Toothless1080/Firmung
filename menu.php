<?php

?>
<script>
    function myAccFunc() {
        var x = document.getElementById("car_acc");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-green";
        } else {
            x.className = x.className.replace(" w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-green", "");
        }
    }
    function myAccFunc2() {
        var x = document.getElementById("tire_acc");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-green";
        } else {
            x.className = x.className.replace(" w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-green", "");
        }
    }
</script>

<div class="w3-sidebar w3-bar-block cus_navbar" style="width:10%">
    <a class="w3-bar-item w3-button" href="http://firmung.philipplauer.com/">Home</a>
    <a class="w3-bar-item w3-button" href="http://firmung.philipplauer.com/KatThemen/cat_theme_overview.php">Kat Themen</a>
    <? // <button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">Car</button> ?>
</div>