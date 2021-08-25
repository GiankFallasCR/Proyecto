<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro</title>
    <?php include './plantilla/link.php'; ?>
    <script src="js/validacion.js" defer></script> 
</head>
<body id="container-page-registration">
    <?php include './plantilla/navbar.php'; ?>
    <section id="form-registration">
        <div class="container">
            <div class="page-header">
              <h1>REGISTRO <small class="tittles-pages-logo">ViajiTico</small></h1>
            </div>
            <p class="lead text-center">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident assumenda asperiores architecto nostrum blanditiis excepturi voluptatibus, velit ad enim. Aperiam voluptatum est, fugit quisquam libero distinctio nobis porro numquam minus.
            </p>
            <div class="row">
                <div class="col-sm-5 text-center">
                    <figure>
                      <img src="./assets/img/img-registration.png" alt="store" class="img-responsive">
                    </figure>
                </div>
                <div class="col-sm-7">
                    <div id="container-form">
                       <p class="text-center lead">Registro de Clientes</p>
                       <br><br>
                       <form class="FormCatElec" action="process/regclien.php" role="form" method="POST" data-form="save">
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-xs-12">
                                <legend><i class="fa fa-user"></i> &nbsp; Datos personales</legend>
                              </div>
                              <div class="col-xs-12">
                                <div class="form-group label-floating">
                                  <label class="control-label"><i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp; Ingrese su número de Cedula</label>
                                  <input class="form-control" type="text" required name="cliennit" pattern="[0-9]{1,15}" title="Ingrese su número de DNI. Solamente números" maxlength="15" >
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                  <label class="control-label"><i class="fa fa-user"></i>&nbsp; Ingrese su nombre</label>
                                  <input class="form-control" type="text" required name="clienfullname" title="Ingrese su nombre (solamente letras)" pattern="[a-zA-Z ]{1,50}" maxlength="50">
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                  <label class="control-label"><i class="fa fa-user"></i>&nbsp; Primer apellidos</label>
                                  <input class="form-control" type="text" required name="clienlastname" title="Ingrese sus apellido (solamente letras)" pattern="[a-zA-Z ]{1,50}" maxlength="50">
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                  <label class="control-label"><i class="fa fa-user"></i>&nbsp; Segundo apellido</label>
                                  <input class="form-control" type="text" required name="clienlastname2" title="Ingrese sus apellido (solamente letras)" pattern="[a-zA-Z ]{1,50}" maxlength="50">
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                  <label class="control-label"><i class="fa fa-mobile"></i>&nbsp; Ingrese su número telefónico</label>
                                    <input class="form-control" type="tel" required name="clienphone" maxlength="15" title="Ingrese su número telefónico. Mínimo 8 digitos máximo 15">
                                </div>
                              </div>
                              <div class="col-xs-12">
                                <div class="form-group label-floating">
                                  <label class="control-label"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp; Ingrese su Email</label>
                                    <input class="form-control" type="email" required name="clienemail" title="Ingrese la dirección de su Email" maxlength="50">
                                </div>
                              </div>
                              <div class="col-xs-12">
                                <legend><i class="fa fa-calendar"></i> &nbsp; Datos de la Reserva</legend>
                              </div>
                              <div class="col-xs-12">
                                <div class="form-group">
                                  <label>Destino</label>
                                    <select class="form-control" name="cliendestino">
                                        <?php
                                              session_start();

                                              include_once './library/configServer.php';
                                              include_once './library/consulSQL.php';

                                              $categoriac = ejecutarSQL::consultar('SELECT * FROM DESTINO');   
                                              oci_execute($categoriac);
                                             
                                              while($catec=oci_fetch_array($categoriac, OCI_ASSOC)){
                                                echo '<option type="number" value="'.$catec['ID_DESTINO'].'">'.$catec['DES_ACTIVIDAD'].'</option>';
                                              }
                                        ?>
                                    </select>
                                </div>
                              </div>
                              <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                  <label>Idioma Preferido:&nbsp;</label>
                                  <span class="idIdioma">
                                  <label for="lidiomaEspa">Espa&ntilde;ol</label>
                                      <input id="Espa" type="radio" name="idioma" value="1" checked="checked" />&nbsp;
                                  <label for="lidiomaIngles">Ingl&#233;s</label>
                                      <input id="Ingles" type="radio" name="idioma" value="2" />
                                  </span>
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                  <label>Fecha:&nbsp;</label>
                                    <span class="idDate">
                                    <input type="date" id="fecha" name="fecha"
                                        value="2021-08-23"
                                        min="2021-08-19" max="2022-12-31">
                                    </span>
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="form-group">
                                  <label>Cantidad:&nbsp;</label></br>
                                  <span class="idCantidad">
                                  <input type="number" id="cantidad" name="cantidad" min="1" max="10">
                                  </span>
                                </div>
                              </div>
                              <div class="col-xs-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Cometario</label>
                                    <input class="form-control" type="text" required name="comentario" title="Repita la contraseña">
                                </div>
                              </div>
                            </div>
                          </div>
                          <p><button type="submit" class="btn btn-primary btn-block btn-raised">Registrarse</button></p>
                        </form> 
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <?php include './plantilla/footer.php'; ?>
</body>
</html>