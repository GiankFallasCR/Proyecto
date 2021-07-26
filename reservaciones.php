<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<link href="CSS/estilos.css" rel="stylesheet" />
    <script language="JavaScript1.2">
        function UpdateCartQuantity() {
            document.cart_quantity.submit();
        }
        function changeQuantity(qty) {
            document.cart_quantity['quantity'].value = Number(document.cart_quantity['quantity'].value) + Number(qty);
            UpdateCartQuantity();
        }
    </script>-->
</head>

<body>
    <div class="navbar">
        <div id="menu">
            <a href="index.html">Inicio</a>
            <a href="reservaciones.php">Reservaciones</a>
            <a href="#contact">Contacto</a>
        </div>
    </div>

    <div class="row">
        <form method="post" action="ingresaCita.php" id="formTutorias" class="main">
            <strong><span id="reservaciones" style="font-family: Arial; font-size: 24pt">HACER UNA RESERVACION</span></strong><br />
            <br />
            <div style="text-align: left; font-family: Arial">
                Nombre:<br />
                <input name="nombrePaciente" type="text" id="nombrePaciente" style="width:504px;" required /><br />
                <br />
                Primer Apellido:<br />
                <input name="apellido1" type="text" id="apellido1" style="width:504px;" required /><br />
                <br />
                Segundo Apellido:<br />
                <input name="apellido2" type="text" id="apellido2" style="width:504px;" required /><br />
                <br />
                Cedula:<br />
                <input name="cedula" type="text" id="cedula" style="width:504px;" required /><br />
                <br />
                Tel&#233;fono:<br />
                <input name="telefono" type="text" id="telefono" style="width:504px;" required /><br />
                <br />
                E-mail:<br />
                <input name="email" type="text" id="email" style="width:504px;" required /><br />
                <br />
                Detino:<br />
                <select name="idDestino" id="idDestino" style="font-size:Medium;width:296px;">
                    <option value="1">
                        Teatro Nacional</option>
                    <option value="2">
                        Parque Nacional Volcan Irazu</option>
                    <option value="3">
                        Parque Nacional Manuel Antonio</option>
                    <option value="4">
                        Parque Nacional Volcán Tenorio</option>
                    <option value="5">
                        Parque Nacional Tortuguero</option>

                </select><br />
                <br />
                Día:<br />
                <select name="idDay" id="idDay" style="font-size:Medium;">
                    <option value="1">lunes</option>
                    <option value="2">martes</option>
                    <option value="3">mi&#233;rcoles</option>
                    <option value="4">jueves</option>
                    <option value="5">viernes</option>
                    <option value="6">Sabado</option>
                    <option value="7">Domingo</option>

                </select><br />
                <br />
                Día:<br />
                <select name="idMonth" id="idMonth" style="font-size:Medium;">
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>

                </select><br />
                <br />
                A&ntilde;o: &nbsp;
                <span id="idYear">
                <label for="lyear2021">2021</label>
                    <input id="year2021" type="radio" name="year" value="2021" checked="checked" />
                <label for="lyear2022">2022</label>
                    <input id="year2021" type="radio" name="year" value="2022" />
                Idioma de Preferencia: &nbsp;
                <span id="idIdioma">
                <label for="lidiomaEspa">Espa&ntilde;ol</label>
                    <input id="Espa" type="radio" name="idioma" value="2021" checked="checked" />
                <label for="lidiomaIngles">Ingl&#233;s</label>
                    <input id="Ingles" type="radio" name="idioma" value="2022" />
                <br />
                <br />
                Cometario:<br />
                <textarea name="padecimiento" rows="2" cols="20" id="padecimiento" style="height:64px;width:440px;" required></textarea><br />
                <br />
                <label for="cantidad">Cantidad de personas:</label>
                <input type="number" id="cantidad" name="cantidad" min="10" max="100">
                <br /><br />
                <input type="submit" name="btEnviar" value="Enviar datos" id="btEnviar" style="width:112px;" onclick="return validaciones();" />
                &nbsp;
                <input type="reset" name="btRestablecer" value="Restablecer" id="btRestablecer" style="width:112px;" />
            </div>
        </form>
    </div>
</body>

</html>