<?php
echo 'Inicio de sesion';

?>
    <form action="index.php" type="post">
        <p>Nombre</p>
        <input type="text" name="nombre">
    </form>
<?php

// echo $_COOKIE["nombre"];
// echo $_POST['nombre'];

$value = htmlentities($_POST["nombre"]);

//guardamos el valor del usuario en una cookie
setcookie("nombre", $value);

//Si el cookie es creado aparecera un boton que nos enviara a la pagina form
if (isset($_COOKIE["nombre"])) {
    ?>
    <form action="form.php">
        <input type="submit" value="Enviar">
    </form>
    <?php
}
?> 