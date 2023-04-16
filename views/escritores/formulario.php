<fieldset >
    <legend >Información General</legend>
        <div >
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="escritor[nombre]" placeholder="Nombre Escritor" value="<?php echo s( $escritor->nombre ); ?>">
        </div>
        <div >
            <label for="preciohora">Precio/Hora</label>
            <input  type="number" id="preciohora" name="escritor[preciohora]" placeholder="Precio/Hora" value="<?php echo s($escritor->preciohora); ?>">
        </div>
        <div>
            <label >Imagen 1</label>
            <input  type="file" id="imagen1" name="escritor[imagen1]" accept="image/jpg, image/png" name="imagen1">
            <?php if($escritor->imagen1){?>
                <img src="/imagenes/<?php echo $escritor->imagen1 ?>" class="imagen-small">
            <?php } ?>
        </div>
        <div>

            <label for="imagen2">Imagen 2</label>
            <input  type="file"  id="imagen2" name="escritor[imagen2]" accept="image/jpg, image/png" name="imagen2">
            <?php if($escritor->imagen2){?>
                <img src="/imagenes/<?php echo $escritor->imagen2 ?>" class="imagen-small">
            <?php } ?>
            </div>
            <div >

            <label for="imagen3">Imagen 3</label>
            <input type="file"  id="imagen3" name="escritor[imagen3]" accept="image/jpg, image/png" name="imagen3">
            <?php if($escritor->imagen3){?>
                <img src="/imagenes/<?php echo $escritor->imagen3 ?>" class="imagen-small">
            <?php } ?>
            </div>
            <div>

            <div >
            <label for="intro">Introducción</label>
            <input type="text" id="intro" name="escritor[intro]" placeholder="Introducción Escritor" value="<?php echo s( $escritor->intro ); ?>">
            </div>

            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="escritor[descripcion]" required><?php echo s($escritor->descripcion); ?></textarea>
            </fieldset>

            <fieldset>
            <legend >Información Personal</legend>
            <div>

            <label for="servicio">Servicios Ofrecidos</label>
            <select  name="escritor[servicioId]" id="servicio" required>
                <option selected value="">-- Seleccionar --</option>
                <?php foreach($servicios as $servicio) { ?>
                <option <?php echo $escritor-> servicioId === $servicio->id ? 'selected' : '' ?> value="<?php echo s($servicio->id); ?>"><?php echo s($servicio->nombre); ?>
                <?php  } ?>
            </select>
            </div>
            <label for="idioma">Idiomas</label>
            <select  name="escritor[idiomaId]" id="idioma" required>
                <option selected value="">-- Seleccionar --</option>
                <?php foreach($idiomas as $idioma) { ?>
                <option <?php echo $escritor-> idiomaId === $idioma->id ? 'selected' : '' ?> value="<?php echo s($idioma->id); ?>"><?php echo s($idioma->nombre); ?>
                <?php  } ?>
            </select>
            </div>

