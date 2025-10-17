<?php
function listado_cookies() {
    echo '-------------------------------------COOKIES <br>';
    foreach ($_COOKIE as $k) {
        echo '--'.$k.'<br>';
    }

    echo '<br>'.'<br>'.'<br>'.'nombre '.$_COOKIE['wp-settings-1'];
}