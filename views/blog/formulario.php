        <label for="imagen">Imagen:</label>
            <input type="file"  id="imagen" name="entradablog[imagen]" accept="image/jpg, image/png" name="imagen">
            <?php if($entradablog->imagen){?>
                <img src="/imagenes/<?php echo $entradablog->imagen ?>" class="imagen-small">
            <?php } ?>
        <label for="titulo">Titulo</label>
        <input type="text" id="titulo" name="entradablog[titulo]" placeholder="Titulo" value="<?php echo s( $entradablog->titulo ); ?>">
        <label for="entradilla">Entradilla</label>
        <input type="text" id="entradilla" name="entradablog[entradilla]" placeholder="Entradilla" value="<?php echo s( $entradablog->entradilla ); ?>">
        <label for="cuerpo">Texto</label>
        <textarea id="cuerpo" name="entradablog[cuerpo]" required><?php echo s($entradablog->cuerpo); ?></textarea>
