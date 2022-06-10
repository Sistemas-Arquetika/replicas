<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
</head>
<body>
    <h1>Proyectos Existentes</h1>

    <?php

        include('conexion.php');
        //consulta para recuperar las bases de datos
        $sqlConsultaBDD = ("SHOW DATABASES LIKE 'aran%';");
        $queryData = mysqli_query($conn,$sqlConsultaBDD);
        $totalRegistros = mysqli_num_rows($queryData);
        //echo $totalRegistros;
    ?>


    <select name="color" id="color">

        <?php 

            while($data = mysqli_fetch_array($queryData)){  ?>

                <option value="r"><?php echo $data['Database (aran%)']; ?></option> 

            <?php } /*libero el recurso*/   mysqli_close($conn) ?>

    </select>


</body>
</html>