<html>
<head>

<?php 
include("concerts.php");
/// AÑADE EL CODIGO NECESARIO PARA PODER ACCEDER AL CONTENIDO DEL FICHERO concerts.php

?>

</head>


<body>

    <!-- <td>
        <th>Nombre del artista</th>
        <th>Ciudad</th>
        <th>Estilo</th>
        <th>Fecha</th>
        <th>Asistencia</th>
        <th>Ingresos</th>
    </td>
    <td>
        <tr></tr>
    </td> -->

    <form action="index.php" type="$_POST">
        <p>Nombre del artista</p>
        <input type="text" name="nombre">
        <p>Ciudad</p>
        <input type="text" name="ciudad">
        <p>Estilo</p>
        <input type="text" name="estilo">
        <p>Fecha</p>
        <input type="text" name="fecha">
        <p>Asistencia</p>
        <input type="text" name="asistencia">
        <p>Ingresos</p>
        <input type="text" name="ingresos">
        <br><br>
        <input type="submit" value="Enviar">
    </form>


<?php

    $db = new DBManager();
    //comprueba que se haya iniciado el Post y si se ha iniciado va a enviar los datos a la base de datos
    if (isset($_POST)) {
        $nom = htmlentities($_POST("nombre"));
        $ciu = htmlentities($_POST("ciudad"));
        $est = htmlentities($_POST("estilo"));
        $fec = htmlentities($_POST("fecha"));
        $asi = htmlentities($_POST("asistencia"));
        $ing = htmlentities($_POST("ingresos"));
        $concert = new Concert("$nom", "$ciu", "$est", "$fec", $asi, $ing);
        $db->storeConcert($concert);
    }
    
    
    // EJEMPLO:
    // $db = new DBManager();
    
    // $concert = new Concert("Foo Fighters", "London", "Rock", date("Y-m-d", strtotime("2020-03-01")), 85000, 1000000);
    // $db->storeConcert($concert);

    // $concert = new Concert("Harry Styles", "New York", "Pop", date("Y-m-d", strtotime("2022-05-05")), 20000, 500000);
    // $db->storeConcert($concert);

    $concertsArray = $db->getConcerts();

    echo"<ul>";
    foreach ($concertsArray as $concert){
        echo "<li>$concert</li>";
    }
    echo "<ul>";
    

?>

</body>

</html>
