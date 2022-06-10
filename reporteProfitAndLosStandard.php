<!DOCTYPE html>
<html lang="en">
<head            >
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profit and Lost</title>
    <link rel="stylesheet" href="estilosReportes.css">
</head>
<body>
    <h1>Report Profit and Lost Standard</h1>

    <?php

    include('conexion.php');
    //consulta para recuperar el reporte
    $sqlReporteEstimatesVsActual = ("SELECT * FROM profitandlossstandard");
    $queryData = mysqli_query($conn,$sqlReporteEstimatesVsActual);
    $totalRegistros = mysqli_num_rows($queryData);
    ?>

    <h2>Proyecto: <strong>(<?php echo $database; ?>)</strong></h2>

    <h3>Total de Registros: <strong>(<?php echo $totalRegistros; ?>)</strong></h3>

    <div id="main-container">

    <table border="1">
        <thead>
            <tr>
                <th>Label</th>
                <th>Amount</th>
                <th>Row Type</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
            while($data = mysqli_fetch_array($queryData)){  ?>

                <tr>
                    <td><?php echo $data['label']; ?></td>
                    <td><?php echo $data['amount']; ?></td>
                    <td><?php echo $data['rowtype']; ?></td>
                </tr>
                
            <?php } /*libero el recurso*/   mysqli_close($conn) ?>

        </tbody>
    </table>

    </div>

</body>
</html>