
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Consulta contable</title>
</head>
<body>
    <div id ="container">
        
        <h1>Bienvenido al sistema de consulta contable</h1>
        <br>
        <h2>Por Favor, ingrese el periodo requerido</h2>
    <form action="formulario.php" method="post" id = "date-form">
        <div class="input-fecha">
            <label for="anio">Año</label>
            <input id="input-anio" name="anio" type="number" required>
        </div>
        <div class="input-fecha">
            <label for="mes">mes</label>
            <input id="input-mes" name="mes" type="number" required>
        </div>
        <button type="button" id="btnBuscar">Buscar</button>
    </form>
    <spam id ="mensaje-csv">Se ha creado un archivo CSV del periodo solicitado en la carpeta de usuario</spam>
    </div>

    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>