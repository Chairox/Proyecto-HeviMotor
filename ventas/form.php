
<form action="agregar_al_carrito.php" method="post">
    <input type="hidden" name="id_repuesto" value="<?php echo $repuesto->id ?>">
    <button class="button is-primary">
        <i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito
    </button>
</form>