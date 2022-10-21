<?php
echo 'Bienvenido a la página #1';

?>
    <form action="form.php">
        <p>Nombre</p>
        <input type="text" name="nombre" value="$value">
    </form>
<?php

setcookie("nombre", $value, time()+3600);
?> 