<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>

<body>
    <?php
    $puestos = [
        ['L', 'L', 'L', 'L', 'L'], //Fila 1
        ['L', 'L', 'L', 'L', 'L'], //Fila 2
        ['L', 'L', 'L', 'L', 'L'], //Fila 3
        ['L', 'L', 'L', 'L', 'L'], //Fila 4
        ['L', 'L', 'L', 'L', 'L'], //Fila 5
    ];

    ?>

    <h1>Actividad 4</h1>
    <!-- Start table -->
    <table id="puestos">
        <!-- Start thead -->
        <thead>
            <tr>
                <!-- Uno las celdas de la primera fila -->
                <th colspan="6" class="colspanTitle">Escenario</th>
            </tr>
            <tr>
                <th></th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
            </tr>
        </thead>
        <!-- End thead -->
        <!-- Start tbody -->
        <tbody>
            <?php
            // Se imprimen todas las filas
            for ($i = 0; $i < sizeof($puestos); $i++) {
                echo '<tr>';
                echo '<th>', $i + 1, '</th>';
                // Se imprimen los datos de cada fila
                foreach ($puestos[$i] as $puesto) {
                    echo '<td>', $puesto, '</td>';
                }
                echo '</tr>';
            }
            ?>
        </tbody>
        <!-- End tbody -->
    </table>
    <!-- End table -->

    <!-- Creo un formulario para enviar los datos -->
    <form action="" target="_self" method="POST">
        <label>Fila<input type="text" name="numeroDeFila"><br></label>
        <label>Puesto<input type="text" name="puesto"><br></label>
        <label>Reservar<input type="radio" value="R" name="accion-de-puesto" checked><br></label>
        <label>Comprar<input type="radio" value="C" name="accion-de-puesto"><br></label>
        <label>Liberar<input type="radio" value="L" name="accion-de-puesto"><br></label>
        <input type="submit" onclick="cambiarContenidoCelda()" id="submit" value="Comprar">
        <input type="reset" value="Borrar">

    </form>

    <?php
    // Recibo los datos y valido que no sea vacio
    if (isset($_POST['numeroDeFila'], $_POST['puesto'])) {
        $numFila = $_POST['numeroDeFila'];
        $numCol = $_POST['puesto'];
        $puesto = &$puestos[$numFila][$numCol];
        if ($puesto != 'L') {
    ?>
            <script>
                alert("La operación no puede ser realizada");
            </script>
    <?php
        } else {
            $puesto = $_POST['accion-de-puesto'];
            echo '<h1>', $puesto, '</h1>';
        }
        unset($_POST);
    }

    ?>

    <script>
        // $('#submit').on('click', function(event) {
        //     // event.preventDefault()

        // })
        // Hago el intento de cambiar los valores de la celda
        function cambiarContenidoCelda() {
            let fila = 5 - 1
            let columna = 5 - 1
            let celda = document.getElementById('puestos').rows[fila].cells;
            celda[columna].innerHTML = '2'
        }
    </script>


</body>

</html>