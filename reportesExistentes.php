<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes Generales - Especificos</title>
</head>
<body>

    <script src="./llamadas.js"></script>

    <h1>Reportes Existentes</h1>



    <h4>Exportar Reportes</h4>
    <h4>REPORTESSSSS</h4>
    

    <a href="./creacionExcel.php">Generar excel</a>

    <br>
    <br>
    <br>


    <form>
        <select name="formularios" id="formularios" onchange="getCombo(this)">
            <option value="Balance">Balance Sheet Standard</option>
            <option value="Profit">Profit and Loss Standard</option>
            <option value="Bloque_a">Bloque A</option>
            <option value="Bloque_b">Bloque B</option>
            <option value="Bloque_c">Bloque C</option>
            <option value="Bloque_d">Bloque D</option>
            <option value="Bloque_e">Bloque E</option>
            <option value="Bloque_f">Bloque F 31-32</option>
            <option value="Bloque_f1">Bloque F 33-34</option>
        </select>
    </form>
    

    <br>
    <br>
    <br>


    <?php

        include('conexion.php');
        //consulta para recuperar las bases de datos
        $sqlConsultaBDD = ("SHOW TABLES LIKE 'jobestimatesvsactualsdetail%';");
        $queryData = mysqli_query($conn,$sqlConsultaBDD);
        $totalRegistros = mysqli_num_rows($queryData);
        //echo $totalRegistros;
    ?>


    <?php

        include('conexion.php');
        //consulta para recuperar las bases de datos
        $sqlConsultaBDD1 = ("SHOW TABLES LIKE '%standard%';");
        $queryData1 = mysqli_query($conn,$sqlConsultaBDD1);
        $totalRegistros1 = mysqli_num_rows($queryData1);
        //echo $totalRegistros;
    ?>


    <select name="color" id="color">

        <?php 

            while($data = mysqli_fetch_array($queryData)){  ?>

                <option value="r"><?php echo $data['Tables_in_aranda (jobestimatesvsactualsdetail%)']; ?></option> 

            <?php } /*libero el recurso*/   mysqli_close($conn) ?>

    </select>

    <select name="color" id="color">

        <?php 

            while($data = mysqli_fetch_array($queryData1)){  ?>

            <option value="r"><?php echo $data['Tables_in_aranda (%standard%)']; ?></option> 

        <?php } /*libero el recurso*/   mysqli_close($conn) ?>

    </select>


</body>
</html>