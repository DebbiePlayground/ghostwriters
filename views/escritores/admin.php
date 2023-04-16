<main class="contenedor seccion">

<?php if(intval($resultado) === 1) : ?>
    <p class="alerta exito"><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>Registro Creado Correctamente</p>
    <?php elseif(intval($resultado) === 2): ?>
        <p class="alerta exito"><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>Registro Actualizado Correctamente</p>
    <?php elseif(intval($resultado) === 3): ?>
        <p class="alerta exito"><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>Registro Eliminado Correctamente</p>        
    <?php endif; ?>

<!-- Tab links -->
<div class="tab">
  <button class="tablinks" onclick="openAdmin(event, 'Servicios')">Servicios</button>
  <button class="tablinks" onclick="openAdmin(event, 'Idiomas')">Idiomas</button>
  <button class="tablinks" onclick="openAdmin(event, 'Blog')">Blog</button>
</div>

<!-- Tab content -->
<div id="Servicios" class="tabcontent">
<h2>Servicios</h2>
<div class="contenedor-boton">
    <a class="admin_boton" href="/servicios/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Servicio
    </a>
</div>
<table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Id</th>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($servicios as $servicio) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $servicio->id; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $servicio->nombre; ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/servicios/actualizar?id=<?php echo $servicio->id?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                                Editar
                            </a>

                            <form method="POST" action="servicios/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $servicio->id; ?>">
                                <input type="hidden" name="tipo" value="servicio">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
</div>

<div id="Idiomas" class="tabcontent">
<h2>Idiomas</h2>
<div class="contenedor-boton">
    <a class="admin_boton" href="/idiomas/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Idioma
    </a>
</div>
<table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Id</th>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($idiomas as $idioma) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $idioma->id; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $idioma->nombre; ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/idiomas/actualizar?id=<?php echo $idioma->id?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                                Editar
                            </a>

                            <form method="POST" action="idiomas/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $idioma->id; ?>">
                                <input type="hidden" name="tipo" value="idioma">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
</div>

<div id="Blog" class="tabcontent">
<h2>Entradas Blog</h2>

<div class="contenedor-boton">
    <a class="admin_boton" href="/blog/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Entrada
    </a>
</div>
<table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Id</th>
                    <th scope="col" class="table__th">Titulo</th>
                    <th scope="col" class="table__th">Fecha de Creación</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($entradasblog as $entradablog) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $entradablog->id; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $entradablog->titulo; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $entradablog->createDate; ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/blog/actualizar?id=<?php echo $entradablog->id?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                                Editar
                            </a>

                            <form method="POST" action="blog/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $entradablog->id; ?>">
                                <input type="hidden" name="tipo" value="entradablog">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
</div>

</main>
