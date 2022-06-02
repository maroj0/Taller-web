<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/css/style.css ">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css"/>
        <script src="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.umd.js"></script>
        <link rel="icon" href="favicon.ico">
        <title>Registro de Usuarios</title>
    </head>
    <body>
        <header class="titulo_registro">
            <h1>Registro de Usuarios</h1>
        </header>
        <nav class="menu">
            <ul>
                <a href="index.html" class="link_menu"><li class="menu_superior">Iniciar Sesion</li></a>
                <li class="menu_superior">|</li>
                <a href="" class="link_menu"><li class="menu_superior">Olvide mi contraseña</li></a>
                <li class="menu_superior">|</li>
                <a href="" class="link_menu"><li class="menu_superior">Acerca de Nosotros</li></a>
            </ul>
        </nav>
        <form action="" method="post">
            <div class="datos_registro">
                <section class="seccion_datos">
                    <article class="datos_formulario_registro">
                        <h2>Datos de Inicio de Sesion</h2>
                        <div class="lineas_formulario">
                            <label class="etiquetas">E-mail *</label>
                            <input type="email" name="email" class="campo_registro"  data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el email con el que registrara su cuenta" id="example" onblur="comprobrarEmail()" required>
                            <!--Se agrega el atributo 'data-bs-toggle="tooltip"' que permitira mostrar un mensaje descriptivo sobre cada input del formulario-->
                        </div>
                        <div class="lineas_formulario">
                            <label class="etiquetas">Contraseña *</label>
                            <input type="password" name="contrasenia" class="campo_registro" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese la contraseña de su nueva cuenta"required>
                        </div>
                        <div class="lineas_formulario">
                            <label class="etiquetas">Repetir Contraseña *</label>
                            <input type="password" name="contrasenia" class="campo_registro" data-bs-toggle="tooltip" data-bs-placement="top" title="Repita la contraseña" required>
                        </div>
                    </article>
                    <article class="datos_formulario_registro">
                        <h2>Datos Personales</h2>
                        <div class="lineas_formulario">
                            <label class="etiquetas">Nombre</label>
                            <input type="text" name="nombre_user" class="campo_registro" maxlength="60" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese su(s) nombre(s)">
                        </div>
                        <div class="lineas_formulario">
                            <label class="etiquetas">Apellido</label>
                            <input type="text" name="apellido_user" class="campo_registro" maxlength="60" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese su(s) apellido(s)">
                        </div>
                        <div class="lineas_formulario">
                            <label class="etiquetas">Genero</label>
                            <div>
                                <input type="radio" id="masculino" name="genero_masculino" value="Masculino" data-bs-toggle="tooltip" data-bs-placement="top" title="Seleccione el genero con el que se identifica">
                                <label for="masculino" style="margin-right: 50px;">Masculino</label>
                                <input type="radio" id="femenino" name="genero_femenino" value="Femenino" data-bs-toggle="tooltip" data-bs-placement="top" title="Seleccione el genero con el que se identifica">
                                <label for="femenino" style="margin-right: 20px;">Femenino</label>
                            </div>
                        </div>
                        <div class="lineas_formulario">
                            <label class="etiquetas">Numero de Teléfono</label>
                            <input type="tel" name="num_tel" class="campo_registro" placeholder="(Código de área) Número" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese su numero de telefono celular">
                        </div>
                        <div class="lineas_formulario">
                            <label class="etiquetas">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nacimiento" class="datepicker" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese la su Fecha de Nacimiento, debe marcarla en el calendario">
                        </div>
                        <div class="lineas_formulario">
                            <label class="etiquetas">Página Web</label>
                            <input type="url" name="pagina_web" class="campo_registro" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese su pagina web">
                        </div>
                    </article>
                    <article class="datos_formulario_registro">
                        <h2>Datos de Localización</h2>
                        <div class="lineas_formulario">
                        <label class="etiquetas">País</label>
                        <select name="pais" id="pais" class="campo_registro" data-bs-toggle="tooltip" data-bs-placement="top" title="Seleccion su Pais de residencia">
                            <option value="AR">Argentina</option>
                        </select>
                        </div>
                        <div class="lineas_formulario">
                        <label class="etiquetas">Provincia</label>
                        <select name="Provincia" id="provincia" class="campo_registro" data-bs-toggle="tooltip" data-bs-placement="top" title="Seleccion su Provincia de residencia" onchange="buscarUbicacion()">
                            <option value="Misiones">Misiones</option>
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Buenos Aires Capital">Buenos Aires Capital</option>
                            <option value="Catamarca">Catamarca</option>
                            <option value="Chaco">Chaco</option>
                            <option value="Chubut">Chubut</option>
                            <option value="Cordoba">Cordoba</option>
                            <option value="Corrientes">Corrientes</option>
                            <option value="Entre Rios">Entre Rios</option>
                            <option value="Formosa">Formosa</option>
                            <option value="Jujuy">Jujuy</option>
                            <option value="La Pampa">La Pampa</option>
                            <option value="La Rioja">La Rioja</option>
                            <option value="Mendoza">Mendoza</option>
                            <option value="Neuquen">Neuquen</option>
                            <option value="Rio Negro">Rio Negro</option>
                            <option value="Salta">Salta</option>
                            <option value="San Juan">San Juan</option>
                            <option value="San Luis">San Luis</option>
                            <option value="Santa Cruz">Santa Cruz</option>
                            <option value="Santa Fe">Santa Fe</option>
                            <option value="Santiago del Estero">Santiago del Estero</option>
                            <option value="Tierra del Fuego">Tierra del Fuego</option>
                            <option value="Tucuman">Tucuman</option>
                        </select>
                        </div>
                        <div class="lineas_formulario">
                        <label class="etiquetas">Ciudad</label>
                        <select name="ciudad" id="ciudad" class="campo_registro" data-bs-toggle="tooltip" data-bs-placement="top" title="Seleccione su Ciudad de residencia" onchange="buscarUbicacion()">
                            <option value="Posadas">Posadas</option>
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Iguazu">Iguazú</option>
                        </select>
                        </div>
                        <div class="lineas_formulario">
                        <label class="etiquetas">Calle</label>
                        <input name="calle_user" id="calle" class="campo_registro" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese la calle de su domicilio" 
                        onchange="buscarUbicacion()" oninput="this.onchange()">
                        <!--Cada vez que se produzca un cambio sobre el input de la Calle se llamara a la funcion que permite ubicar dicha direccion en el mapa-->
                        </div>
                        <div class="lineas_formulario">
                        <label class="etiquetas">Altura (numero)</label>
                        <input name="altura_calle" id="altura" class="campo_registro" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese la altura a la que se encuentra su domicilio"
                        onchange="buscarUbicacion()" oninput="this.onchange()">
                        <!--Cada vez que se produzca un cambio sobre el input de la Altura se llamara a la funcion que permite ubicar dicha direccion en el mapa-->
                        </div>
                        <div class="lineas_formulario">
                            <div>
                                <label class="etiquetas">Coordenadas</label>
                            </div>
                            <div>
                                <input type="number" id="lat" name="latitud" style="width: 80px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese las coordenadas precisas de su Localizacion">
                                <label class="etiquetas">Lat</label>
                                <input type="number" id="long" name="longitud" style="width: 80px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese las coordenadas precisas de su Localizacion">
                                <label class="etiquetas">Long</label>
                        
                            </div>
                        </div>
                        <div id="map"></div><!--Div donde se agregara el mapa-->
                    </article>
                    <div class="boton_registrar_cuenta">
                        <button type="submit" class="btn btn-primary">Crear mi Cuenta</button> <!--Boton predeterminado de Bootstrap-->
                    </div>
                </section>
                <section>
                    <div class="div_banner">
                        <img src="/img/usuario.png">
                        <p>Al hacer clic en "Crear mi<br> cuenta", aceptas las Condiciones<br> y confirmas que leiste nuestra<br> Politica de datos, incluido el uso<br> de cookies.</p>
                    </div>
                </section>
            </div>
        </form>
        <footer class="pie_de_pagina">
            <ul class="menu_inferior">
                <a href="https://www.youtube.com/" class="link_menu" target="_blank"><li class="texto_menu_inferior">YouTube</li></a>
                <li class="texto_menu_inferior">-</li>
                <a href="https://www.ugd.edu.ar/" class="link_menu" target="_blank"><li class="texto_menu_inferior">U.G.D.</li></a>
                <li class="texto_menu_inferior">-</li>
                <a href="https://campusvirtual.ugd.edu.ar/" class="link_menu" target="_blank"><li class="texto_menu_inferior">Campus Virtual</li></a>
            </ul>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('/assets/js/jquery-3.6.0.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/Actividad3B.js'); ?>"></script>     
        <script src="<?php echo base_url('/assets/js/Actividad3A.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/registro.js'); ?>"></script>
    </body>
</html>