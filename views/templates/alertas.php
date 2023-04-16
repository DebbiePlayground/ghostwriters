<?php
    foreach($alertas as $key => $mensajes):
        foreach($mensajes as $mensaje):
?>
    <div class="alerta <?php echo $key; ?>">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        
        <?php echo $mensaje; ?>
    </div>
<?php
        endforeach;
    endforeach;
?>