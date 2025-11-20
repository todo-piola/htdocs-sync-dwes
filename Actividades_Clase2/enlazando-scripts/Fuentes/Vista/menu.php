<ul>
    <?php
    // Recorremos el array MENU_ITEMS
    foreach (MENU_ITEMS as $clave => $texto) {
        echo '<li><a href="#">' . $texto . '</a></li>';
    }
    ?>
</ul>