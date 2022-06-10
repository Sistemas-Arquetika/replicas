<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolidado</title>
    <link rel="stylesheet" href="estilosConsolidados.css">
</head>
<body>
    <h1>Reporte Consolidado</h1>

    <?php

    include('conexion.php');
    //consulta para recuperar el reporte
    $sqlReporteEstimatesVsActual = ("SELECT * FROM jobestimatesvsactualsdetailaranda");
    $queryData = mysqli_query($conn,$sqlReporteEstimatesVsActual);
    $totalRegistros = mysqli_num_rows($queryData);
    ?>

    <h2>Proyecto: <strong>(<?php echo $database; ?>)</strong></h2>

    <h3>Total de Registros: <strong>(<?php echo $totalRegistros; ?>)</strong></h3>

    <div id="main-container">

    <table border="1">
        <thead>
            <tr id="encabezadoTabla">
                <th colspan="2">Presupuesto vs Actual</th>
                <th colspan="3">Pagado</th>
                <th colspan="4">Cuentas por Pagar</th>
                <th colspan="5">Totales</th>
            </tr>
            <tr>
                <th id="presupuesto">Detalle</th>
                <th id="presupuesto1">Valor Presupuestado</th>
                <th id="pagado">Gastos Facturados</th>
                <th id="pagado1">Anticipos</th>
                <th id="pagado2">Inventario</th>
                <th id="cuenta">Cuentas por Pagar</th>
                <th id="cuenta1">Adicionales no presupuestados por pagar</th>
                <th id="cuenta2">Proyecto de gasto cierre de proyecto</th>
                <th id="total">Total proyectado gasto</th>
                <th id="total1">Diferencia</th>
                <th>(%) Diferencia sobre valor presupuestado</th>
                <th>Observaciones</th>
            </tr>

        </thead>
        <tbody>
            <?php 
            
            while($data = mysqli_fetch_array($queryData)){  ?>

                <tr>
                    <td><?php echo $data['label']; ?></td>
                    <td><?php echo $data['est_cost']; ?></td>
                    <td><?php echo $data['act_cost']; ?></td>
                    <td><?php echo $data['_diff_']; ?></td>
                    <td><?php echo $data['est_revenue']; ?></td>
                    <td><?php echo $data['act_revenue']; ?></td>
                    <td><?php echo $data['diff2']; ?></td>
                </tr>
                
            <?php } /*libero el recurso*/   mysqli_close($conn) ?>

        </tbody>
    </table>

    </div>

</body>
</html>